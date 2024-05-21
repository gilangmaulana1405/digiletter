<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mahasiswa;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistController extends Controller
{
    public function index()
    {
        return view('auth/register');
    }

    public function create()
    {
        $validator = $this->validate(request(), [
            'name' => 'required',
            'npm' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $allowedDomain = 'student.unsika.ac.id';
        $email = request('email');
        $npm = request('npm');
        $npmRegex = '/^([0-9]{13})@student\.unsika\.ac\.id$/i';

        // Jika email tidak memiliki domain student.unsika.ac.id.
        if (substr(strrchr($email, "@"), 1) !== $allowedDomain) {
            return redirect()->back()->withInput()->with('error', 'Alamat email harus memiliki domain ' . $allowedDomain);
        }

        // Ambil awalan npm dari email (contoh: 2010631170075@student.unsika.ac.id -> 2010631170075)
        // preg_match($npmRegex, $email, $matches);
        // $extractedNpm = $matches[1] ?? null;
        
        // Periksa apakah npm yang diambil sesuai dengan npm yang diinput
        // if ($extractedNpm !== $npm) {
        //     return redirect()->back()->withInput()->with('error', 'Bagian depan email harus sesuai dengan NPM.');
        // }

        // Periksa apakah terdapat karakter HTML khusus dalam input
        $containsHtmlSpecialChar = $this->containsHtmlSpecialChar(request()->all());
        if ($containsHtmlSpecialChar) {
            return redirect()->route('regist')->with('error', 'Input tidak valid, harap isi dengan teks biasa.');
        }

        // Periksa apakah email telah terdaftar
        $existingUser = User::where('email', $email)->first();
        if ($existingUser) {
            return redirect()->back()->withInput()->with('error', 'Email sudah terdaftar. Gunakan email lain.');
        }

        // Periksa apakah npm terdaftar di tabel Mahasiswa
        $mahasiswa = Mahasiswa::where('npm', $npm)->first();
        if (!$mahasiswa) {
            return redirect()->back()->withInput()->with('error', 'NPM yang dimasukkan bukan mahasiswa Fasilkom.');
        }

        // Temukan atau buat pengguna baru
        $user = User::firstOrCreate(
            ['npm' => $npm],
            [
                'name' => Str::title(request('name')),
                'email' => $email,
                'password' => bcrypt(request('password')),
                'remember_token' => Str::random(60),
            ]
        );

        // Hubungkan pengguna dengan mahasiswa
        Mahasiswa::updateOrCreate(
            ['npm' => $npm],
            ['user_id' => $user->id, 'foto' => 'user_profile.png']
        );

        return redirect()->route('login')->with('success', 'Anda Telah Berhasil Mendaftar!');
    }

    private function containsHtmlSpecialChar($data)
    {
        foreach ($data as $value) {
            if ($value != strip_tags($value)) {
                return true;
            }
        }
        return false;
    }
}
