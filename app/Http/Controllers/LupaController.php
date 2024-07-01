<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\Verifytoken;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Log;

class LupaController extends Controller
{
    public function index(): View
    {
        return view('lupapw.lupa');
    }
    public function cekemail(Request $request)
    {
        $email = $request->email;
        $cek = User::where('email', $email)->first();

        if ($cek) {
            $request->session()->put('reset_email', $request->email);
            $validToken = rand(100000, 999999);
            Log::info("valid token is" . $validToken);
            $get_token = new Verifytoken();
            $get_token->token =  $validToken;
            $get_token->email =  $request->email;
            $get_token->save();
            $get_user_email = $request->email;
            $get_user_name = $cek->username;
            Mail::to($request->email)->send(new WelcomeMail($get_user_email, $validToken, $get_user_name));
            //redirect to index
            return redirect()->route('verifyLupa')->with('alert', 'Kode OTP berhasil di Kirimkan, Silahkan Cek Email Anda!');
        } else {
            return redirect('/forgots')->with('alert', 'Email Anda Tidak Ditemukan!');
        }
    }
    public function resetpw(Request $request)
    {
        $tokenFromRequest = $request->token;
        $verifycoursetoken = Verifytoken::where('token', $tokenFromRequest)->first();

        if ($verifycoursetoken) {
            $verifycoursetoken->is_activated = 1;
            $verifycoursetoken->save();

            $user = User::where('email', $verifycoursetoken->email)->first();
            $user->is_activated = 1;
            $user->save();

            $getting_token = Verifytoken::where('token', $verifycoursetoken->token)->first();
            Log::info('Token yang ditemukan: ' . ($getting_token ? $getting_token->token : 'null'));

            if ($getting_token) {
                $getting_token->delete();
            }
            return redirect()->route('ubahpw')->with('alert', 'Silahkan Ubah Password Anda!');
        } else {
            return redirect()->route('verifyLupa')->with('alert', 'Kode OTP Salah, Silahkan Cek Lagi!');
        }
    }
    public function resetotplupa(Request $request)
    {
        // Mengambil email dari sesi
        $email = $request->session()->get('reset_email');

        // Generate token
        $validToken = rand(100000, 999999); // Mengubah '.' menjadi ','
        Log::info("valid token is" . $validToken);

        // Simpan atau update token ke dalam tabel Verifytoken
        Verifytoken::updateOrCreate(
            ['email' => $email], // Menggunakan $email dari sesi
            ['token' => $validToken]
        );

        // Ambil data user berdasarkan email
        $user = User::where('email', $email)->first();
        if ($user) {
            $get_user_email = $user->email;
            $get_user_name = $user->username;
            // Kirim email
            Mail::to($get_user_email)->send(new WelcomeMail($get_user_email, $validToken, $get_user_name));

            // Redirect ke halaman verifikasi
            return redirect()->route('verifyLupa')->with('alert', 'Kode OTP Baru berhasil dikirimkan, Silahkan cek email Anda!');
        } else {
            // Jika email tidak ditemukan dalam tabel user
            return redirect()->back()->with('error', 'Email tidak ditemukan');
        }
    }
    public function verifyLupa(Request $request)
    {
        return view('lupapw.otpverif');
    }
    public function ubahpw(Request $request)
    {
        return view('lupapw.gantipw');
    }
    public function simpanpw(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:8|confirmed', // Konfirmasi password harus cocok dengan field 'password_confirmation'
        ]);

        // Ambil user yang ingin diubah passwordnya, misalnya dengan ID
        $user = User::where('email', $request->email)->first();

        // Hash password baru
        if ($user) {
            // Hash password baru
            $hashedPassword = Hash::make($request->password);

            // Simpan password baru ke database
            $user->password = $hashedPassword;
            $user->save();
            $request->session()->forget('reset_email');
            return redirect('/logins')->with('alert', 'Password Telah di Ubah, Silahkan Login!');
        } else {
            // Jika user tidak ditemukan, redirect ke halaman yang sesuai
            return redirect('/forgots')->with('alert', 'Email tidak ditemukan');
        }
    }
}
