<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function home()
    {
        $userAuth = auth()->user();

        // agar di navbar foto profile selalu sesuai
        if ($userAuth && $userAuth->mahasiswa) {
            $navbarView = view('layouts/navbar', compact('userAuth'));
            $sidebarView = view('layouts/sidebar', compact('userAuth'));

            return view('pages.home', compact('navbarView', 'sidebarView', 'userAuth'));
        }
    }

    public function profile($id)
    {
        $userAuth = auth()->user();
        if ($userAuth && $userAuth->mahasiswa) {
            $navbarView = view('layouts/navbar', compact('userAuth'));
            $sidebarView = view('layouts/sidebar', compact('userAuth'));

            $user = User::with('mahasiswa')->where('name', auth()->user()->name)->find($id);
            $createdAt = $user->created_at;

            return view('pages.profile', [
                $navbarView, $sidebarView,  'user' => $user, 'userAuth', 'createdAt' => $createdAt,
            ]);
        }
    }

    public function lengkapiProfile(Request $request, $id)
    {
        $request->validate([
            'semester' => 'required|numeric',
            'domisili' => 'required',
            'no_hp' => 'required|numeric',
            'foto' => 'image|mimes:jpg,png,svg|max:1024',
        ], [
            'semester.required' => 'Semester harus diisi',
            'domisili.required' => 'Domisili harus diisi',
            'no_hp.required' => 'Nomor HP harus diisi',
        ]);

        // Memeriksa apakah ada kolom yang belum diisi
        $columnsToCheck = ['semester', 'domisili', 'no_hp'];
        foreach ($columnsToCheck as $column) {
            if (!$request->filled($column)) {
                return redirect()->route('user.profile', ['id' => $id])->with('error', ucfirst($column) . ' harus diisi.');
            }
        }

        // Upload gambar baru
        $file = $request->file('foto');
        $namaFile = null;

        if ($file) {
            $npmMahasiswa = auth()->user()->npm;
            $namaFile = auth()->user()->name . '-' . $npmMahasiswa . '-' . time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/foto-mahasiswa', $namaFile);
        }

        // Ambil foto sebelumnya
        $previousFoto = Mahasiswa::where('user_id', $id)->value('foto');

        // Tetapkan foto sebelumnya jika upload baru bernilai null
        $namaFile = $namaFile ?? $previousFoto;

        $data = [
            'user_id' => $id,
            'semester' => $request->input('semester'),
            'prodi' => $request->input('prodi'),
            'domisili' => $request->input('domisili'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'no_hp' => $request->input('no_hp'),
            'status' => $request->input('status'),
            'foto' => $namaFile
        ];

        Mahasiswa::updateOrCreate(['user_id' => $id], $data);

        return redirect()->route('user.profile',  ['id' => $id])->with('success', 'Data diri telah berhasil diubah!');
    }

    public function settingAccount($id)
    {
        $userAuth = auth()->user();
        if ($userAuth && $userAuth->mahasiswa) {
            $navbarView = view('layouts/navbar', compact('userAuth'));
            $sidebarView = view('layouts/sidebar', compact('userAuth'));
            $user = User::with('mahasiswa')->where('name', auth()->user()->name)->find($id);

            return view('pages.settingAccount', [
                $navbarView, $sidebarView, 'user' => $user, 'userAuth'
            ]);
        }
    }

    public function settingSecurity($id)
    {
        $userAuth = auth()->user();
        if ($userAuth && $userAuth->mahasiswa) {
            $navbarView = view('layouts/navbar', compact('userAuth'));
            $sidebarView = view('layouts/sidebar', compact('userAuth'));

            return view('pages.settingSecurity', [
                $navbarView, $sidebarView, 'userAuth'
            ]);
        }
    }

    public function changePassword(Request $request, $id)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:6|confirmed',
        ], [
            'current_password.required' => 'Password saat ini harus diisi.',
            'password.required' => 'Password baru harus diisi.',
            'password.min' => 'Password minimal 6 karakter.',
            'password.confirmed' => 'Konfirmasi Password baru tidak cocok.',
        ]);

        $user = User::find($id);

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->withInput()->with('error', 'Password saat ini tidak sesuai.');
        }

        $user->update(['password' => bcrypt($request->password)]);

        return redirect()->back()->with('success', 'Password berhasil diubah.');
    }

    public function markAsReadApprove($id)
    {
        if ($id) {
            auth()->user()->notifications->where('id', $id)->markAsRead();
        }

        return redirect()->back();
    }

    // public function downloadSurat($folders, $file_path)
    // {
    //     $folders = ['surat-izin-penelitian', 'surat-keterangan-aktif', 'surat-keterangan-aktif-ortu-pns', 'surat-bebas-pustaka', 'surat-pengajuan-cuti'];

    //     $file = storage_path("app/public/{$folders}/{$file_path}");

    //     if (file_exists($file)) {
    //         return response()->download($file);
    //     } else {
    //         abort(404, 'File not found');
    //     }
    // }

    public function downloadSurat($folders, $file_path)
    {
        $allowedFolders = ['surat-izin-penelitian', 'surat-keterangan-aktif', 'surat-keterangan-aktif-ortu-pns', 'surat-bebas-pustaka', 'surat-pengajuan-cuti'];

        if (!in_array($folders, $allowedFolders)) {
            abort(404, 'Invalid folder');
        }

        $file = storage_path("app/public/{$folders}/{$file_path}");

        if (file_exists($file)) {
            return response()->download($file);
        } else {
            abort(404, 'File not found');
        }
    }
}
