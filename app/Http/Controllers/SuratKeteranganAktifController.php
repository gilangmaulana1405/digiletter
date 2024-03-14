<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\User;
use App\Models\TtdPimpinan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\SuratKeteranganAktif;
use App\Notifications\UserNotifcation;
use App\Notifications\AdminNotification;
use PhpOffice\PhpWord\TemplateProcessor;

class SuratKeteranganAktifController extends Controller
{
    public function create($id)
    {
        $navbarView = view('layouts/navbar');
        $sidebarView = view('layouts/sidebar');

        $data = User::where('id', $id)->first();

        return view('pages.formsuratketeranganaktif', [$navbarView, $sidebarView, 'data' => $data]);
    }

    public function store(Request $request)
    {
        $data = new SuratKeteranganAktif();
        $data->nama_mhs = Str::title($request->input('nama_mhs'));
        $data->npm = $request->input('npm');
        $data->prodi = $request->input('prodi');
        $data->semester = $request->input('semester');
        $data->tgl_lahir = $request->input('tgl_lahir');
        $data->alamat = Str::title($request->input('alamat'));

        $timestamp = now()->timestamp;
        $fileName = $timestamp . '_Surat_Keterangan_Aktif_Kuliah_' . Str::title($data->nama_mhs) . '_' . $data->npm . '.pdf';
        $filePath =  $fileName;

        $data->file_path = $filePath;
        $data->jenis_surat = 'Surat Keterangan Aktif Kuliah';

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

        $outputPath = storage_path('app\\public\\surat-keterangan-aktif\\' . $filePath);
        $pdf = $this->createPdf($data);
        $pdf->save($outputPath);

        return redirect()->back()->with('success', 'Surat Keterangan Aktif telah dibuat. Periksa menu Riwayat Surat untuk melihat file surat!');
    }

    private function createPdf($data)
    {
        $ttdPimpinanDataIF = TtdPimpinan::where('prodi_pimpinan', 'Informatika')->get();
        $ttdPimpinanDataSI = TtdPimpinan::where('prodi_pimpinan', 'Sistem Informasi')->get();

        $pdf = null;

        if ($data->prodi === 'Informatika') {
            if ($ttdPimpinanDataIF->isEmpty()) {
                $defaultTtdData =
                    [
                        'penanda_tangan' => 'a.n Dekan <br> Koord. Program Studi',
                        'nama_pimpinan' => 'E. Haodudin Nurkifli, M.Cs., Ph.D',
                        'ttd_image' => 'ttd_if.png',
                        'nomor_induk' => 'NIP. 198504032021211003'
                    ];
                $pdf = PDF::loadView('template_surat.surat_keterangan_aktif_if', compact('data', 'defaultTtdData'));
            } else {
                $pdf = PDF::loadView('template_surat.surat_keterangan_aktif_if', compact('data', 'ttdPimpinanDataIF'));
            }
        } elseif ($data->prodi === 'Sistem Informasi') {
            if ($ttdPimpinanDataSI->isEmpty()) {
                $defaultTtdData = [
                    'penanda_tangan' => 'A.n Dekan, <br> Koor. Program Studi,',
                    'nama_pimpinan' => 'Azhari Ali Ridha, S.Kom., M.M.S.I.',
                    'ttd_image' => 'ttd_si.png',
                    'nomor_induk' => 'NIDN. 0415098003'
                ];
                $pdf = PDF::loadView('template_surat.surat_keterangan_aktif_si', compact('data', 'defaultTtdData'));
            } else {
                $pdf = PDF::loadView('template_surat.surat_keterangan_aktif_si', compact('data', 'ttdPimpinanDataSI'));
            }
        }

        // Set paper size to F4
        $pdf->setPaper('legal', 'portrait');

        return $pdf;
    }

    private function updatePdfContent($SuraKeteranganAktif)
    {
        // Gantilah dengan path file PDF yang sesuai dengan struktur penyimpanan Anda
        $outputPath = storage_path('app\\public\\surat-keterangan-aktif\\' . $SuraKeteranganAktif->file_path);

        // Gunakan dompdf untuk membuat PDF baru dengan informasi yang diperbarui
        $pdf = $this->createPdf($SuraKeteranganAktif);

        // Simpan PDF baru dengan konten yang diperbarui
        $pdf->save($outputPath);
    }

    public function riwayatSuratKeteranganAktif()
    {
        $navbarView = view('layouts/navbar');
        $sidebarView = view('layouts/sidebar');

        $data = SuratKeteranganAktif::orderBy('created_at', 'desc')->where('nama_mhs', auth()->user()->name)->get();


        return view('pages.riwayatsurat', [
            'data' => $data,
            $navbarView,
            $sidebarView
        ]);
    }

    public function setujuiSuratKeteranganAktif(Request $request, $id)
    {
        $SuratKeteranganAktif = SuratKeteranganAktif::findOrFail($id);

        $SuratKeteranganAktif->nomor_surat = $request->input('nomor_surat');
        $SuratKeteranganAktif->status = 'disetujui';
        $SuratKeteranganAktif->updated_at = now();
        $SuratKeteranganAktif->save();

        // ambil nama_mhs saja dalam 1 data objek
        $nama_mhs = SuratKeteranganAktif::where('nama_mhs', $SuratKeteranganAktif->nama_mhs)
            ->pluck('nama_mhs');

        $users = User::where('role', 'user')
            ->whereIn('name', $nama_mhs)
            ->get();

        foreach ($users as $user) {
            $user->notify(new UserNotifcation([
                'user_id' => auth()->user()->id,
                'name' => auth()->user()->name,
                'jenis_surat' => 'Surat Keterangan Aktif Kuliah'
            ]));
        }

        // Update konten file PDF
        $this->updatePdfContent($SuratKeteranganAktif);

        return redirect()->back()->with('success', 'Surat Keterangan Aktif Kuliah telah disetujui!');
    }

    public function tidaksetujuSuratKeteranganAktif(Request $request, $id)
    {
        $SuratKeteranganAktif = SuratKeteranganAktif::findOrFail($id);
        $SuratKeteranganAktif->status = 'ditolak';
        $SuratKeteranganAktif->keterangan = $request->input('text_input');
        $SuratKeteranganAktif->save();

        return redirect()->back()->with('success', 'Surat Keterangan Aktif Kuliah telah ditolak!');
    }

    public function cancelsuratKeteranganAktif($id)
    {
        $SuratKeteranganAktif = SuratKeteranganAktif::find($id);
        $SuratKeteranganAktif->status = null;
        $SuratKeteranganAktif->keterangan = null;
        $SuratKeteranganAktif->save();
        session()->forget('data_approved_notifications');
        return redirect()->back();
    }

    public function downloadSuratKeteranganAktif($file_path)
    {
        $file = storage_path('app/public/surat-keterangan-aktif/' . $file_path);

        if (file_exists($file)) {
            return response()->download($file);
        } else {
            abort(404, 'File not found');
        }
    }
}
