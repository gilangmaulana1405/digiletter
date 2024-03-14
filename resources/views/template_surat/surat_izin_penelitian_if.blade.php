<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Izin Penelitian</title>
    <style>
        table tr td {
            font-size: 13px;
        }

        body {
            margin-left: 5px;
        }

        table {
            margin-left: auto;
            margin-right: auto;
        }

        .left {
            width: 1px;
            position: relative;
            right: 50px;
            top: -60px;
            float: left;
        }

        .img-blu {
            position: relative;
            left: 180px;
            bottom: -150px;
            float: left;
        }

        .container {
            display: flex;
            justify-content: space-between;
        }

        .table2 {
            margin-top: -30px;
        }

        textarea {
            white-space: pre-line;
        }

    </style>
</head>

<body>
    <center>
        <table border="0">
            <tr>
                <td><img src="{{ public_path('/template/assets/img/surat/logo_unsika.png') }}" width="120" height="120" alt=""></td>
                <td>
                    <center>
                        <font size="5">KEMENTRIAN PENDIDIKAN, KEBUDAYAAN</font> <br>
                        <font size="5">RISET, DAN TEKNOLOGI</font> <br>
                        <font size="4">UNIVERSITAS SINGAPERBANGSA KARAWANG</font> <br>
                        <font size="4"><strong>FAKULTAS ILMU KOMPUTER</strong></font> <br>
                        <font size="3">Jalan HS. Ronggowaluyo Telukjambe Timur Karawang 41361</font> <br>
                        <font size="3">Laman : unsika.ac.id, email : fasilkom@unsika.ac.id</font> <br>
                    </center>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <hr width="500">
                </td>
            </tr>
            <tr>
                <td></td>
                <td style="max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; text-align: right;">
                    <font size="3">Karawang, {{ \Carbon\Carbon::parse($data['created_at'])->locale('id_ID')->isoFormat('D MMMM Y') }}</font>
                </td>
            </tr>
        </table>
        <br>
        <br>

        <table border="0" width="500" class="table2">
            <tr>
                <td>
                    <font size="3">Nomor</font>
                </td>
                <td width="400">: <font size="3">{{ $data->nomor_surat}}</font>
                </td>
            </tr>
            <tr>
                <td>
                    <font size="3">Lampiran</font>
                </td>
                <td width="400">: -</td>
            </tr>
            <tr>
                <td>
                    <font size="3">Perihal</font>
                </td>
                <td width="400">: <font size="3">Permohonan Izin Penelitian</font>
                </td>
            </tr>
        </table>

        <br>
        <table border="0" width="500">
            <tr>
                <td>
                    <font size="3">Yth. <br> {{ $data['tujuan_surat'] }} <br> {{ $data['tujuan_instansi'] }} <br> di <br> {{ $data['domisili_instansi'] }}
                    </font>
                </td>
            </tr>
        </table>
        <br>

        <table border="0" width="500">
            <tr>
                <td>
                    <font size="3">Dipermaklumkan dengan hormat, sehubungan dengan Penelitian Skripsi yang harus
                        dilaksanakan <br> di luar kampus Fakultas Ilmu Komputer Universitas Singaperbangsa
                        Karawang, kami mohon bagi mahasiswa di bawah ini :</font>
                </td>
            </tr>
        </table>

        <br>

        <table border="0" width="400">
            <tr>
                <td>
                    <font size="3">Nama</font>
                </td>
                <td>:</td>
                <td>
                    <font size="3">{{ $data['nama_mhs'] }}</font>
                </td>
            </tr>
            <tr>
                <td>
                    <font size="3">NPM</font>
                </td>
                <td>:</td>
                <td>
                    <font size="3"> {{ $data['npm'] }}</font>
                </td>
            </tr>
            <tr>
                <td>
                    <font size="3">Program Studi</font>
                </td>
                <td>:</td>
                <td>
                    <font size="3"> S1 - {{ $data['prodi'] }}</font>
                </td>
            </tr>
            <tr>
                <td>
                    <font size="3">Jenjang Pendidikan</font>
                </td>
                <td>:</td>
                <td>
                    <font size="3"> Sarjana (S1)</font>
                </td>
            </tr>
            <tr>
                <td>
                    <font size="3">Judul Penelitian</font>
                </td>
                <td>:</td>
                <td>
                    <font size="3"> {{ $data['judul_penelitian'] }}</font>
                </td>
            </tr>
        </table>

        <br>
        <table border="0" width="500">
            <tr>
                <td>
                    <font size="3">Mahasiswa tersebut bermaksud melakukan penelitian dan Permohonan Data yang
                        berkaitan dengan <kegiatan>pembelajaran di Instansi/Perusahaan yang Bapak/Ibu Pimpin selama 6 (Enam) bulan terhitung dari tanggal pembuatan surat ini.
                    </font>
                </td>
            </tr>
        </table>
        <br>

        <table border="0" width="500">
            <tr>
                <td>
                    <font size="3">Demikian disampaikan, atas perhatian dan perkenannya kami ucapkan terima kasih.
                    </font>
                </td>
            </tr>
        </table>

        <br>
        <br>
        <br>

        <table border="0" width="600">
            <tr>
                <td width="340"></td>
                <td align="left">
                    {{--A.n Dekan, <br> Koor. Program Studi--}}

                    <font size="3">Karawang, {{ \Carbon\Carbon::parse($data['created_at'])->locale('id_ID')->isoFormat('D MMMM Y') }}</font>
                    <br>
                    <font size="3">{!! nl2br($ttdPimpinanDataIF[0]->penanda_tangan ?? $defaultTtdData['penanda_tangan'] ?? '') !!}</font>
                    <br>
                    <div class="container">
                        <br>
                        <br>
                        <div class="left">
                            @if (isset($ttdPimpinanDataIF) && $ttdPimpinanDataIF->isNotEmpty() && isset($ttdPimpinanDataIF[0]->ttd_image))
                            <img src="{{ public_path('storage/ttd/terbaru/' . $ttdPimpinanDataIF[0]->ttd_image) }}" width="180" alt="">
                            @else
                            <img src="{{ public_path('storage/ttd/'. $defaultTtdData['ttd_image']) }}" width="180" alt="">
                            @endif
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>

                    <font size="3">{{ $ttdPimpinanDataIF[0]->nama_pimpinan ?? $defaultTtdData['nama_pimpinan'] ?? '' }}</font>
                    {{-- <font size="3">E.Haodudin Nurkifli, S.T., M.Cs., Phd.</font> --}}
                    <br>
                    {{-- <font size="3">NIDN : 003048503</font> --}}
                    <font size="3">{{ $ttdPimpinanDataIF[0]->nomor_induk ?? $defaultTtdData['nomor_induk'] ?? '' }}</font>

                    <br>
                    <br>
                    <br>
                    <img class='img-blu' src="{{ public_path('storage/ttd/blu.png') }}" width="60" height="60" alt="">
                </td>
            </tr>
        </table>
    </center>
</body>

</html>
