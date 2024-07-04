<?php

namespace App\Http\Controllers;

use App\Models\Arsip;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index(): View
    {
        $username = Auth::user()->username;
        $data = User::where('username', $username)->first();
        return view('admin.dashboardadmin', compact('data'));
    }

    public function createuser()
    {
        return view('admin.createuser');
    }

    public function createarsip()
    {
        return view('admin.createarsip');
    }

    public function validasiarsip(Request $request)
    {
        $validatedData = $request->validate([
            'kode_kelas' => 'required|string|max:255',
            'jenis_arsip' => 'required|string|max:255',
            'uraian' => 'required|string',
            'kurun_waktu' => 'required|string|max:255',
            'jumlah_berkas' => 'required|integer',
            'tanggal_entry' => 'required|date',
            'uploader' => 'required|string|max:255',
            'file' => 'required|file|mimes:pdf,doc,docx,zip',
        ]);


        $pdfFile = $request->file('file');
        if ($pdfFile) {
            $extension = $pdfFile->getClientOriginalExtension();
            $newPDF = 'document-' . now()->timestamp . '.' . $extension;
            $pdfFile->storeAs('public/data', $newPDF);
        }


        // Save the data to the database
        $arsip = Arsip::create([
            'kode_kelas' => $validatedData['kode_kelas'],
            'jenis_arsip' => $validatedData['jenis_arsip'],
            'uraian' => $validatedData['uraian'],
            'kurun_waktu' => $validatedData['kurun_waktu'],
            'jumlah_berkas' => $validatedData['jumlah_berkas'],
            'tanggal_entry' => Carbon::parse($validatedData['tanggal_entry'])->toDateString(),
            'uploader' => $validatedData['uploader'],
            'file' => $newPDF,
        ]);

        return redirect('/arsipadm')->with('success', 'Arsip berhasil disimpan.');
    }

    public function profileadm(): View
    {
        $username = Auth::user()->username;
        $data = User::where('username', $username)->first();
        return view('admin.profileadmin', compact('data'));
    }

    public function updatedataadmin(Request $request, $username)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
            'hp' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'gambar' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = User::where('username', $username)->first();

        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $extension = $image->getClientOriginalExtension();
            $newNama = 'profile-' . now()->timestamp . '.' . $extension;
            $image->storeAs('public/data', $newNama);

            if ($data->gambar) {
                Storage::delete('public/data/' . $data->gambar);
            }

            $data->gambar = $newNama;
        }

        $data->update([
            'name' => $request->name,
            'email' => $request->email,
            'hp' => $request->hp,
            'jabatan' => $request->jabatan,
        ]);

        return redirect('/profileadm')->with('alert', 'Profil berhasil diperbarui');
    }

    public function arsipadm()
    {
        $username = Auth::user()->username;
        $data = User::where('username', $username)->first();
        $arsip = Arsip::all();
        return view('admin.arsipadmin', compact('data', 'arsip'));
    }

    public function users(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'jabatan' => $request->jabatan,
            'hp' => '-',
            'gambar' => '-',
        ]);

        return redirect('/showusers')->with('alert', 'User berhasil dibuat');
    }

    public function setting()
    {
        $username = Auth::user()->username;
        $data = User::where('username', $username)->first();
        return view('admin.setting', compact('data'));
    }
    public function edituser($email)
    {
        $user = User::where('email', $email)->first();
        return view('admin.changeuser', compact('user'));
    }
    public function updateuser(Request $request, $email)
    {
        $user = User::where('email', $email)->first();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->jabatan = $request->input('jabatan');
        $user->role = $request->input('role');
        $user->save();

        return redirect('/showusers')->with('alert', 'User berhasil diedit');
    }
    public function deleteuser($email)
    {
        $user = User::where('email', $email)->first();
        if (!$user) {
            return redirect('/showusers')->with('alert', 'User tidak ditemukan');
        }
        $user->delete();
        return redirect('/showusers')->with('alert', 'User berhasil dihapus');
    }

    public function deletearsip($nomor)
    {
        $arsip = Arsip::where('nomor', $nomor)->first();
        if (!$arsip) {
            return redirect('/arsipadm')->with('alert', 'Arsip tidak ditemukan');
        }
        $arsip->delete();
        return redirect('/arsipadm')->with('alert', 'Arsip berhasil dihapus');
    }

    public function editarsip($nomor)
    {
        $arsip = Arsip::where('nomor', $nomor)->first();
        return view('admin.changearsip', compact('arsip'));
    }

    public function updatearsip(Request $request, $nomor)
    {
        $arsip = Arsip::where('nomor', $nomor)->first();
        $arsip->kode_kelas = $request->input('kode_kelas');
        $arsip->jenis_arsip = $request->input('jenis_arsip');
        $arsip->uraian = $request->input('uraian');
        $arsip->kurun_waktu = $request->input('kurun_waktu');
        $arsip->jumlah_berkas = $request->input('jumlah_berkas');
        $arsip->uploader = $request->input('uploader');
        $arsip->save();

        return redirect('/arsipadm')->with('alert', 'Arsip berhasil diedit');
    }

    public function changepw(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ], [
            'password.min' => 'Password minimal 8 karakter.',
            'password.confirmed' => 'Password tidak sama.',
        ]);

        $user = User::where('username', $request->username)->first();

        if ($user) {
            $hashedPassword = Hash::make($request->password);
            $user->password = $hashedPassword;
            $user->save();
            return redirect('/logins')->with('alert', 'Password Telah di Ubah, Silahkan Login Kembali!');
        } else {
            return redirect('/setting')->with('alert', 'Password tidak Sama!');
        }
    }

    public function showusers()
{
    $username = Auth::user()->username;
    $data = User::where('username', $username)->first();
    // Mengambil semua pengguna dengan peran 'Admin' atau 'User'
    $showuser = User::whereIn('role', ['Admin', 'User'])->get();
    return view('admin.showuser', compact('data', 'showuser'));
}


    public function logout()
    {
        Auth::logout();
        return redirect('/logins');
    }
}
