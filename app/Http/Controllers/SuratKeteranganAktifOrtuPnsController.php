<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\User;
use App\Models\TtdPimpinan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\SuratKeteranganAktifOrtuPns;
use App\Notifications\UserNotifcation;
use App\Notifications\AdminNotification;
use PhpOffice\PhpWord\TemplateProcessor;

class SuratKeteranganAktifOrtuPnsController extends Controller
{
    public function create($id)
    {
        $navbarView = view('layouts/navbar');
        $sidebarView = view('layouts/sidebar');

        $data = User::where('id', $id)->first();

        return view('pages.formsuratketeranganaktifortupns', [$navbarView, $sidebarView, 'data' => $data]);
    }

    public function store(Request $request)
    {
        $data = new SuratKeteranganAktifOrtuPns();

        // mahasiswa
        $data->nama_mhs = Str::title($request->input('nama_mhs'));
        $data->npm = $request->input('npm');
        $data->prodi = $request->input('prodi');
        $data->semester = $request->input('semester');
        $data->alamat = Str::title($request->input('alamat'));

        // ortu
        $data->nama_ortu = Str::title($request->input('nama_ortu'));
        $data->nomor_induk_ortu = $request->input('nomor_induk_ortu');
        $data->jabatan_ortu = Str::title($request->input('jabatan_ortu'));
        $data->instansi = Str::title($request->input('instansi'));

        $timestamp = now()->timestamp;
        $fileName = $timestamp . '_Surat_Keterangan_Aktif_Kuliah_Ortu_PNS_' . Str::title($data->nama_mhs) . '_' . $data->npm . '.pdf';
        $filePath =  $fileName;

        $data->file_path = $filePath;
        $data->jenis_surat = 'Surat Keterangan Aktif Kuliah Ortu PNS';

        $data->save();

        // Notify admins
        $admins = User::where('role', 'admin')->get();

        foreach ($admins as $admin) {
            $admin->notify(new AdminNotification([
                'user_id' => auth()->user()->id,
                'name' => auth()->user()->name,
                'jenis_surat' => $data->jenis_surat
            ]));
        }

        $outputPath = storage_path('app\\public\\surat-keterangan-aktif-ortu-pns\\' . $filePath);
        $pdf = $this->createPdf($data);
        $pdf->save($outputPath);

        return redirect()->back()->with('success', 'Surat Keterangan Aktif Ortu PNS telah dibuat. Periksa menu Riwayat Surat untuk melihat file surat!');
    }

    private function createPdf($data)
    {
        $ttdPimpinanDataWadek = TtdPimpinan::where('prodi_pimpinan', 'Wadek')->get();

        $pdf = null;

        if ($ttdPimpinanDataWadek->isEmpty()) {
            $defaultTtdData =
                [
                    'penanda_tangan' => 'a.n Dekan, <br> Wakil Dekan Bidang Akademik dan Kemahasiswaan',
                    'nama_pimpinan' => 'Nina Sulistiyowati, ST., M.Kom.',
                    'ttd_image' => 'ttd_wadek.png',
                    'nomor_induk' => 'NIP. 198302092021212006'
                ];
            $pdf = PDF::loadView('template_surat.surat_keterangan_aktif_ortu_pns', compact('data', 'defaultTtdData'));
        } else {
            $pdf = PDF::loadView('template_surat.surat_keterangan_aktif_ortu_pns', compact('data', 'ttdPimpinanDataWadek'));
        }

        // Set paper size to F4
        $pdf->setPaper('legal', 'portrait');

        return $pdf;
    }

    private function updatePdfContent($SuraKeteranganAktifOrtuPns)
    {
        // Gantilah dengan path file PDF yang sesuai dengan struktur penyimpanan Anda
        $outputPath = storage_path('app\\public\\surat-keterangan-aktif-ortu-pns\\' . $SuraKeteranganAktifOrtuPns->file_path);

        // Gunakan dompdf untuk membuat PDF baru dengan informasi yang diperbarui
        $pdf = $this->createPdf($SuraKeteranganAktifOrtuPns);

        // Simpan PDF baru dengan konten yang diperbarui
        $pdf->save($outputPath);
    }

    public function riwayatSuratKeteranganAktifOrtuPns()
    {
        $navbarView = view('layouts/navbar');
        $sidebarView = view('layouts/sidebar');

        $data = SuratKeteranganAktifOrtuPns::orderBy('created_at', 'desc')->where('nama_mhs', auth()->user()->name)->get();

        return view('pages.riwayatsurat', [
            'data' => $data,
            $navbarView,
            $sidebarView
        ]);
    }

    public function setujuiSuratKeteranganAktifOrtuPns(Request $request, $id)
    {
        $SuratKeteranganAktifOrtuPns = SuratKeteranganAktifOrtuPns::findOrFail($id);

        $SuratKeteranganAktifOrtuPns->nomor_surat = $request->input('nomor_surat');
        $SuratKeteranganAktifOrtuPns->status = 'disetujui';
        $SuratKeteranganAktifOrtuPns->updated_at = now();
        $SuratKeteranganAktifOrtuPns->save();

        // ambil nama_mhs saja dalam 1 data objek
        $nama_mhs = SuratKeteranganAktifOrtuPns::where('nama_mhs', $SuratKeteranganAktifOrtuPns->nama_mhs)
            ->pluck('nama_mhs');

        $users = User::where('role', 'user')
            ->whereIn('name', $nama_mhs)
            ->get();

        foreach ($users as $user) {
            $user->notify(new UserNotifcation([
                'user_id' => auth()->user()->id,
                'name' => auth()->user()->name,
                'jenis_surat' => 'Surat Keterangan Aktif Kuliah Ortu PNS'
            ]));
        }

        // Update konten file PDF
        $this->updatePdfContent($SuratKeteranganAktifOrtuPns);

        return redirect()->back()->with('success', 'Surat Keterangan Aktif Kuliah Ortu PNS telah disetujui!');
    }

    public function tidaksetujuSuratKeteranganAktifOrtuPns(Request $request, $id)
    {
        $SuratKeteranganAktifOrtuPns = SuratKeteranganAktifOrtuPns::findOrFail($id);
        $SuratKeteranganAktifOrtuPns->status = 'ditolak';
        $SuratKeteranganAktifOrtuPns->keterangan = $request->input('text_input');
        $SuratKeteranganAktifOrtuPns->save();

        return redirect()->back()->with('success', 'Surat Keterangan Aktif Kuliah Ortu PNS telah ditolak!');
    }

    public function cancelsuratKeteranganAktifOrtuPns($id)
    {
        $SuratKeteranganAktifOrtuPns = SuratKeteranganAktifOrtuPns::find($id);
        $SuratKeteranganAktifOrtuPns->status = null;
        $SuratKeteranganAktifOrtuPns->keterangan = null;
        $SuratKeteranganAktifOrtuPns->save();
        session()->forget('data_approved_notifications');
        return redirect()->back();
    }

    
    public function downloadSuratKeteranganAktifOrtuPns($file_path)
    {
        $file = storage_path('app/public/surat-keterangan-aktif-ortu-pns/' . $file_path);

        if (file_exists($file)) {
            return response()->download($file);
        } else {
            abort(404, 'File not found');
        }
    }
}
