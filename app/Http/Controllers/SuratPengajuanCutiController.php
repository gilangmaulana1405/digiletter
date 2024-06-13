<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Models\User;
use App\Models\TtdPimpinan;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use App\Models\SuratKeteranganAktif;
use App\Models\SuratPengajuanCuti;
use App\Notifications\UserNotifcation;
use App\Notifications\AdminNotification;
use PhpOffice\PhpWord\TemplateProcessor;

class SuratPengajuanCutiController extends Controller
{
    public function create($id)
    {
        $userAuth = auth()->user();
        if ($userAuth && $userAuth->mahasiswa) {
            $navbarView = view('layouts/navbar', compact('userAuth'));
            $sidebarView = view('layouts/sidebar', compact('userAuth'));

            $data = User::where('id', $id)->first();

            return view('pages.formsuratpengajuancuti', [$navbarView, $sidebarView, 'data' => $data, 'userAuth']);
        }
    }

    public function store(Request $request)
    {
        $buktiPembayaran = $request->file('bukti_pembayaran');
        $request->validate([
            'bukti_pembayaran' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:500',
        ], [
            'bukti_pembayaran.max' => 'Ukuran gambar tidak boleh melebihi 500 KB.',
        ]);

        if ($buktiPembayaran->getSize() > 500 * 1024) {
            return redirect()->back()->withErrors(['bukti_pembayaran' => 'Ukuran gambar tidak boleh melebihi 500 KB.'])->withInput();
        }

        $data = new SuratPengajuanCuti();
        $data->nama_mhs = Str::title($request->input('nama_mhs'));
        $data->npm = $request->input('npm');
        $data->prodi = $request->input('prodi');
        $data->alamat = Str::title($request->input('alamat'));
        $data->no_hp = $request->input('no_hp');
        $data->alasan_cuti = Str::title($request->input('alasan_cuti'));
        $data->periode = $request->input('periode');
        $data->tahun_akademik = $request->input('tahun_akademik');

        $timestamp = now()->timestamp;
        $fileName = $timestamp . '_Surat_Pengajuan_Cuti_' . Str::title($data->nama_mhs) . '_' . $data->npm . '.docx';
        $filePath =  $fileName;

        $data->file_path = $filePath;
        $data->jenis_surat = 'Surat Pengajuan Cuti';

        // img bukti pembayaran
        $imageName = $timestamp . '_' . 'ukt' . '_' . $data->nama_mhs . '_' . $data->npm . '.' . $buktiPembayaran->extension();
        $buktiPembayaran->storeAs('public/bukti-pembayaran', $imageName);
        $data->bukti_pembayaran = $imageName;

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

        $outputPath = storage_path('app\\public\\surat-pengajuan-cuti\\' . $filePath);

        // pembuatan docx
        $templateProcessor = new TemplateProcessor(public_path('Surat-Pengajuan-Cuti.docx'));
        $templateProcessor->setValue('nama_mhs', $data->nama_mhs);
        $templateProcessor->setValue('npm', $data->npm);
        $templateProcessor->setValue('prodi', $data->prodi);
        $templateProcessor->setValue('alamat', $data->alamat);
        $templateProcessor->setValue('no_hp', $data->no_hp);
        $templateProcessor->setValue('alasan_cuti', $data->alasan_cuti);
         $templateProcessor->setValue('periode', $data->periode);
        $templateProcessor->setValue('tahun_akademik', $data->tahun_akademik);
        $templateProcessor->setValue('created_at',  \Carbon\Carbon::parse($data->created_at)->locale('id_ID')->isoFormat('D MMMM Y'));

        $templateProcessor->saveAs($outputPath);

        return redirect()->back()->with('success', 'Surat Pengajuan Cuti telah dibuat. Periksa menu Riwayat Surat untuk melihat file surat!');
    }

    private function updateWordContent($suratPengajuanCuti)
    {
        // Gantilah dengan path file Word yang sesuai dengan struktur penyimpanan Anda
        $outputPath = storage_path('app\\public\\surat-pengajuan-cuti\\' . $suratPengajuanCuti->file_path);

        // Use TemplateProcessor to update the Word document with the new content
        $templateProcessor = new TemplateProcessor(public_path('Surat-Pengajuan-Cuti.docx'));
        $templateProcessor->setValue('nama_mhs', $suratPengajuanCuti->nama_mhs);
        $templateProcessor->setValue('npm', $suratPengajuanCuti->npm);
        $templateProcessor->setValue('prodi', $suratPengajuanCuti->prodi);
        $templateProcessor->setValue('alamat', $suratPengajuanCuti->alamat);
        $templateProcessor->setValue('no_hp', $suratPengajuanCuti->no_hp);
        $templateProcessor->setValue('alasan_cuti', $suratPengajuanCuti->alasan_cuti);
         $templateProcessor->setValue('periode', $suratPengajuanCuti->periode);
        $templateProcessor->setValue('tahun_akademik', $suratPengajuanCuti->tahun_akademik);
        $templateProcessor->setValue('created_at',  \Carbon\Carbon::parse($suratPengajuanCuti->created_at)->locale('id_ID')->isoFormat('D MMMM Y'));
        $templateProcessor->setValue('nomor_surat', $suratPengajuanCuti->nomor_surat);
        // Add more fields as needed

        // Save the updated Word document
        $templateProcessor->saveAs($outputPath);
    }

    public function riwayatSuratPengajuanCuti()
    {
        $userAuth = auth()->user();
        if ($userAuth && $userAuth->mahasiswa) {
            $navbarView = view('layouts/navbar', compact('userAuth'));
            $sidebarView = view('layouts/sidebar', compact('userAuth'));

            $data = SuratPengajuanCuti::orderBy('created_at', 'desc')->where('nama_mhs', auth()->user()->name)->get();

            $jenisSurat = 'Surat Pengajuan Cuti';

            return view('pages.riwayatsurat', [
                'data' => $data,
                $navbarView,
                $sidebarView,
                'jenisSurat' => $jenisSurat
            ]);
        }
    }

    public function setujuiSuratPengajuanCuti(Request $request, $id)
    {
        $SuratPengajuanCuti = SuratPengajuanCuti::findOrFail($id);

        $SuratPengajuanCuti->nomor_surat = $request->input('nomor_surat');
        $SuratPengajuanCuti->status = 'disetujui';
        $SuratPengajuanCuti->updated_at = $request->input('updated_at');
        $SuratPengajuanCuti->save();

        // ambil nama_mhs saja dalam 1 data objek
        $nama_mhs = SuratPengajuanCuti::where('nama_mhs', $SuratPengajuanCuti->nama_mhs)
            ->pluck('nama_mhs');

        $users = User::where('role', 'user')
            ->whereIn('name', $nama_mhs)
            ->get();

        foreach ($users as $user) {
            $user->notify(new UserNotifcation([
                'user_id' => auth()->user()->id,
                'name' => auth()->user()->name,
                'jenis_surat' => 'Surat Pengajuan Cuti'
            ]));
        }

        // Update konten file PDF
        $this->updateWordContent($SuratPengajuanCuti);

        return redirect()->back()->with('success', 'Surat Pengajuan Cuti telah disetujui!');
    }

    public function tidaksetujuSuratPengajuanCuti(Request $request, $id)
    {
        $SuratPengajuanCuti = SuratPengajuanCuti::findOrFail($id);
        $SuratPengajuanCuti->status = 'ditolak';
        $SuratPengajuanCuti->keterangan = $request->input('text_input');
        $SuratPengajuanCuti->save();

        return redirect()->back()->with('success', 'Surat Pengajuan Cuti telah ditolak!');
    }

    public function cancelsuratPengajuanCuti($id)
    {
        $SuratPengajuanCuti = SuratPengajuanCuti::find($id);
        $SuratPengajuanCuti->status = null;
        $SuratPengajuanCuti->keterangan = null;
        $SuratPengajuanCuti->save();
        session()->forget('data_approved_notifications');
        return redirect()->back();
    }


    public function downloadSuratPengajuanCuti($file_path)
    {
        $file = storage_path('app/public/surat-pengajuan-cuti/' . $file_path);

        if (file_exists($file)) {
            return response()->download($file);
        } else {
            abort(404, 'File not found');
        }
    }
}
