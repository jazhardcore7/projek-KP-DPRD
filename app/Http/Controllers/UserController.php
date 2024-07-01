<?php

namespace App\Http\Controllers;

use App\Models\Arsip;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index(): View
    {
        $username = Auth::user()->username;
        $data = User::where('username', $username)->first();
        return view('user.dashboarduser', compact('data'));
    }

    public function profileuser()
    {
        $username = Auth::user()->username;
        $data = User::where('username', $username)->first();
        return view('user.profileuser', compact('data'));
    }

    public function updatedatauser(Request $request, $username)
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

        return redirect('/profileuser')->with('alert', 'Profil berhasil diperbarui');
    }

    public function bantuanuser()
    {
        $username = Auth::user()->username;
        $data = User::where('username', $username)->first();
        return view('user.bantuan', compact('data'));
    }
    public function arsipuser()
    {
        $username = Auth::user()->username;
        $data = User::where('username', $username)->first();
        $arsip = Arsip::all();
        return view('user.arsipuser', compact('data', 'arsip'));
    }
}
