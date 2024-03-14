<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\User;
use App\Models\TtdPimpinan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\SuratBebasPustaka;
use App\Notifications\UserNotifcation;
use App\Notifications\AdminNotification;
use PhpOffice\PhpWord\TemplateProcessor;

class SuratBebasPustakaController extends Controller
{

    public function create($id)
    {
        $navbarView = view('layouts/navbar');
        $sidebarView = view('layouts/sidebar');

        $data = User::where('id', $id)->first();

        return view('pages.formsuratbebaspustaka', [$navbarView, $sidebarView, 'data' => $data]);
    }

    public function store(Request $request)
    {
        $data = new SuratBebasPustaka();
        $data->nama_mhs = Str::title($request->input('nama_mhs'));
        $data->npm = $request->input('npm');
        $data->prodi = $request->input('prodi');

        $timestamp = now()->timestamp;
        $fileName = $timestamp . '_Surat_Bebas_Pustaka_' . Str::title($data->nama_mhs) . '_' . $data->npm . '.pdf';
        $filePath =  $fileName;

        $data->file_path = $filePath;
        $data->jenis_surat = 'Surat Bebas Pustaka';

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

        $outputPath = storage_path('app\\public\\surat-bebas-pustaka\\' . $filePath);
        $pdf = $this->createPdf($data);
        $pdf->save($outputPath);

        return redirect()->back()->with('success', 'Surat Bebas Pustaka telah dibuat. Periksa menu Riwayat Surat untuk melihat file surat!');
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
                        'penanda_tangan' => 'a.n Dekan <br> Koordinator Program Studi Informatika',
                        'nama_pimpinan' => 'E. Haodudin Nurkifli, M.Cs., Ph.D',
                        'ttd_image' => 'ttd_hao.png',
                        'nomor_induk' => 'NIP. 198504032021211003'
                    ];
                $pdf = PDF::loadView('template_surat.surat_bebas_pustaka_if', compact('data', 'defaultTtdData'));
            } else {
                $pdf = PDF::loadView('template_surat.surat_bebas_pustaka_if', compact('data', 'ttdPimpinanDataIF'));
            }
        } elseif ($data->prodi === 'Sistem Informasi') {
            if ($ttdPimpinanDataSI->isEmpty()) {
                $defaultTtdData = [
                    'penanda_tangan' => 'a.n Dekan <br> Koordinator Program Studi Sistem Informasi',
                    'nama_pimpinan' => 'Azhari Ali Ridha, S.Kom., M.M.S.I.',
                    'ttd_image' => 'ttd_azhari.png',
                    'nomor_induk' => 'NIDN. 0415098003'
                ];
                $pdf = PDF::loadView('template_surat.surat_bebas_pustaka_si', compact('data', 'defaultTtdData'));
            } else {
                $pdf = PDF::loadView('template_surat.surat_bebas_pustaka_si', compact('data', 'ttdPimpinanDataSI'));
            }
        }

        // Set paper size to F4
        $pdf->setPaper('legal', 'portrait');

        return $pdf;
    }

    private function updatePdfContent($SuraBebasPustaka)
    {
        // Gantilah dengan path file PDF yang sesuai dengan struktur penyimpanan Anda
        $outputPath = storage_path('app\\public\\surat-bebas-pustaka\\' . $SuraBebasPustaka->file_path);

        // Gunakan dompdf untuk membuat PDF baru dengan informasi yang diperbarui
        $pdf = $this->createPdf($SuraBebasPustaka);

        // Simpan PDF baru dengan konten yang diperbarui
        $pdf->save($outputPath);
    }

    public function riwayatSuratBebasPustaka()
    {
        $navbarView = view('layouts/navbar');
        $sidebarView = view('layouts/sidebar');

        $data = SuratBebasPustaka::orderBy('created_at', 'desc')->where('nama_mhs', auth()->user()->name)->get();

        return view('pages.riwayatsurat', [
            'data' => $data,
            $navbarView,
            $sidebarView
        ]);
    }

    public function setujuiSuratBebasPustaka(Request $request, $id)
    {
        $SuratBebasPustaka = SuratBebasPustaka::findOrFail($id);

        $SuratBebasPustaka->nomor_surat = $request->input('nomor_surat');
        $SuratBebasPustaka->status = 'disetujui';
        $SuratBebasPustaka->updated_at = now();
        $SuratBebasPustaka->save();

        // ambil nama_mhs saja dalam 1 data objek
        $nama_mhs = SuratBebasPustaka::where('nama_mhs', $SuratBebasPustaka->nama_mhs)
            ->pluck('nama_mhs');

        $users = User::where('role', 'user')
            ->whereIn('name', $nama_mhs)
            ->get();

        foreach ($users as $user) {
            $user->notify(new UserNotifcation([
                'user_id' => auth()->user()->id,
                'name' => auth()->user()->name,
                'jenis_surat' => 'Surat Bebas Pustaka'
            ]));
        }

        // Update konten file PDF
        $this->updatePdfContent($SuratBebasPustaka);

        return redirect()->back()->with('success', 'Surat Bebas Pustaka telah disetujui!');
    }

    public function tidaksetujuSuratBebasPustaka(Request $request, $id)
    {
        $SuratBebasPustaka = SuratBebasPustaka::findOrFail($id);
        $SuratBebasPustaka->status = 'ditolak';
        $SuratBebasPustaka->keterangan = $request->input('text_input');
        $SuratBebasPustaka->save();

        return redirect()->back()->with('success', 'Surat Bebas Pustaka telah ditolak!');
    }

    public function cancelsuratBebasPustaka($id)
    {
        $SuratBebasPustaka = SuratBebasPustaka::find($id);
        $SuratBebasPustaka->status = null;
        $SuratBebasPustaka->keterangan = null;
        $SuratBebasPustaka->save();
        session()->forget('data_approved_notifications');
        return redirect()->back();
    }

    
    public function downloadSuratBebasPustaka($file_path)
    {
        $file = storage_path('app/public/surat-bebas-pustaka/' . $file_path);

        if (file_exists($file)) {
            return response()->download($file);
        } else {
            abort(404, 'File not found');
        }
    }
}
