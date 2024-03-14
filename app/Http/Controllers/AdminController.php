<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Ttd;
use App\Models\User;
use App\Models\Mahasiswa;
use App\Models\SuratTugas;
use App\Models\TtdPimpinan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Events\UserDataInput;
use App\Models\SuratBebasPustaka;
use App\Models\SuratPengajuanCuti;
use App\Models\SuratIzinPenelitian;
use App\Models\SuratKeteranganAktif;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Yajra\DataTables\Facades\DataTables;
use App\Models\SuratKeteranganAktifOrtuPns;

class AdminController extends Controller
{

    public function home()
    {
        $totalSuratIzinPenelitian = SuratIzinPenelitian::count();
        $totalSuratKeteranganAktif = SuratKeteranganAktif::count();
        $totalSuratKeteranganAktifOrtuPns = SuratKeteranganAktifOrtuPns::count();
        $totalSuratBebasPustaka = SuratBebasPustaka::count();
        $totalSuratPengajuanCuti = SuratPengajuanCuti::count();
        $totalMahasiswa = Mahasiswa::count();

        $countAllSurat = $totalSuratIzinPenelitian + $totalSuratKeteranganAktif + $totalSuratKeteranganAktifOrtuPns + $totalSuratBebasPustaka + $totalSuratPengajuanCuti;

        $navbarView = view('admin/layouts/navbar');
        $sidebarView = view('admin/layouts/sidebar');
        return view('admin.pages.home', [
            $navbarView,
            $sidebarView,
            'totalSuratIzinPenelitian' => $totalSuratIzinPenelitian,
            'totalSuratKeteranganAktif' => $totalSuratKeteranganAktif,
            'totalSuratKeteranganAktifOrtuPns' => $totalSuratKeteranganAktifOrtuPns,
            'totalSuratBebasPustaka' => $totalSuratBebasPustaka,
            'totalSuratPengajuanCuti' => $totalSuratPengajuanCuti,
            'totalMahasiswa' => $totalMahasiswa,
            'countAllSurat' => $countAllSurat,
        ]);
    }


    public function listdataSuratIzinPenelitian()
    {
        $navbarView = view('admin/layouts/navbar');
        $sidebarView = view('admin/layouts/sidebar');

        $data = SuratIzinPenelitian::orderBy('created_at', 'desc')->get();

        // Menggunakan ucfirst untuk mengubah huruf pertama menjadi besar
        $formattedData = $data->map(function ($item) {
            $item->nama_mhs = ucfirst($item->nama_mhs);
            $item->judul_skripsi = ucfirst($item->judul_skripsi);
            return $item;
        });

        return view('admin.pages.listdata', [
            'data' => $formattedData,
            $navbarView,
            $sidebarView
        ]);
    }

    public function listdataSuratKeteranganAktif()
    {
        $navbarView = view('admin/layouts/navbar');
        $sidebarView = view('admin/layouts/sidebar');

        $data = SuratKeteranganAktif::orderBy('created_at', 'desc')->get();

        return view('admin.pages.listdata', [
            'data' => $data,
            $navbarView,
            $sidebarView
        ]);
    }
    public function listdataSuratKeteranganAktifOrtuPns()
    {
        $navbarView = view('admin/layouts/navbar');
        $sidebarView = view('admin/layouts/sidebar');

        $data = SuratKeteranganAktifOrtuPns::orderBy('created_at', 'desc')->get();

        return view('admin.pages.listdata', [
            'data' => $data,
            $navbarView,
            $sidebarView
        ]);
    }
    public function listdataSuratBebasPustaka()
    {
        $navbarView = view('admin/layouts/navbar');
        $sidebarView = view('admin/layouts/sidebar');

        $data = SuratBebasPustaka::orderBy('created_at', 'desc')->get();

        return view('admin.pages.listdata', [
            'data' => $data,
            $navbarView,
            $sidebarView
        ]);
    }
    public function listdataSuratPengajuanCuti()
    {
        $navbarView = view('admin/layouts/navbar');
        $sidebarView = view('admin/layouts/sidebar');

        $data = SuratPengajuanCuti::orderBy('created_at', 'desc')->get();

        return view('admin.pages.listdata', [
            'data' => $data,
            $navbarView,
            $sidebarView
        ]);
    }

    public function suratPreview($folders, $file_path)
    {
        $folders = ['surat-izin-penelitian', 'surat-keterangan-aktif', 'surat-keterangan-aktif-ortu-pns', 'surat-bebas-pustaka', 'surat-pengajuan-cuti'];

        $path = storage_path("app/public/{$folders}/{$file_path}");
        $iframe = asset($path);

        return $iframe;
    }

    public function markAsRead($id)
    {
        if ($id) {
            auth()->user()->notifications->where('id', $id)->markAsRead();
        }

        return redirect()->back();
    }

    public function profile($id)
    {
        $navbarView = view('admin/layouts/navbar');
        $sidebarView = view('admin/layouts/sidebar');

        $user = User::with('mahasiswa')->where('name', auth()->user()->name)->find($id);
        $createdAt = $user->created_at;

        return view('admin.pages.profile', [
            $navbarView, $sidebarView,  'user' => $user, 'createdAt' => $createdAt,
        ]);
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

    public function formchangeTtd()
    {
        $navbarView = view('admin/layouts/navbar');
        $sidebarView = view('admin/layouts/sidebar');
        return view('admin.pages.uploadttd', [
            $navbarView,
            $sidebarView
        ]);
    }

    public function changeTtdPimpinan(Request $request)
    {
        $request->validate([
            'penanda_tangan' => 'required|string',
            'ttd_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'nama_pimpinan' => 'required|string',
            'prodi_pimpinan' => 'required|string',
            'nomor_induk' => 'required|string',
        ]);

        $imageName = 'ttd' . '_' . $request->nama_pimpinan . '.' . $request->ttd_image->extension();

        $request->ttd_image->storeAs('public/ttd/terbaru', $imageName);

        // Sesuaikan kondisi where berdasarkan prodi_pimpinan
        $ttd = TtdPimpinan::where('prodi_pimpinan', $request->prodi_pimpinan)->first();

        TtdPimpinan::updateOrCreate(
            ['prodi_pimpinan' => $request->prodi_pimpinan],
            [
                'penanda_tangan' => $request->input('penanda_tangan'),
                'ttd_image' => $imageName,
                'nama_pimpinan' => $request->input('nama_pimpinan'),
                'nomor_induk' => $request->input('nomor_induk'),
            ]
        );

        return redirect()->back()->with('success', 'Tanda Tangan dan Nama Pimpinan pada Surat berhasil diubah.');
    }
}
