<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Keterangan Aktif Kuliah</title>
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
            left: 170px;
            bottom: -350px;
            float: left;
        }

        .container {
            display: flex;
            justify-content: space-between;
        }

        .table2 {
            margin-top: -30px;
            text-align: center;
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
        </table>
        <br>
        <br>

        <table border="0" width="500" class="table2">
            <tr>
                <td>
                    <font size="3">SURAT KETERANGAN MAHASISWA AKTIF</font>
                </td>
            </tr>
            <tr>
                <td>
                    <font size="3">Nomor : {{ $data['nomor_surat'] }}</font>
                </td>
            </tr>
        </table>

        <br>

        <table border="0" width="500">
            <tr>
                <td>
                    <font size="3">Dekan Kakultas Ilmu Komputer Universitas Singaperbangsa Karawang dengan ini
                        menerangkan :</font>
                </td>
            </tr>
        </table>

        <br>

        <table border="0" width="500">
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
                    <font size="3">{{ $data['npm'] }}</font>
                </td>
            </tr>
            <tr>
                <td>
                    <font size="3">Semester</font>
                </td>
                <td>:</td>
                <td>
                    <font size="3">{{ $data['semester'] }}</font>
                </td>
            </tr>
            <tr>
                <td width="170">
                    <font size="3"> Fakultas / Program Studi</font>
                </td>
                <td>:</td>
                <td>
                    <font size="3">Ilmu Komputer/S1 - {{ $data['prodi'] }}</font>
                </td>
            </tr>
            <tr>
                <td>
                    <font size="3">Tempat, Tanggal Lahir</font>
                </td>
                <td>:</td>
                <td>
                    <font size="3">{{ $data['tgl_lahir'] }}</font>
                </td>
            </tr>
            <td>
                <font size="3">Alamat</font>
            </td>
            <td>:</td>
            <td>
                <font size="3">{{$data['alamat']}}</font>
            </td>
        </table>

        <br>
        <table border="0" width="500">
            <tr>
                <td>
                    <font size="3">Adalah benar mahasiswa Program Studi S1 - {{ $data['prodi'] }} Fakultas Ilmu Komputer
                        Universitas Singaperbangsa Karawang, yang bersangkutan aktif mengikuti perkuliahan pada tahun
                        akademik 2022/2023 duduk pada Semester {{ $data['semester'] }}.</font>
                </td>
            </tr>
        </table>
        <br>

        <table border="0" width="500">
            <tr>
                <td>
                    <font size="3">Demikian Surat Keterangan ini kami buat dengan sebenarnya, untuk dipergunakan
                        sebagaimana mestinya.
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
                    <font size="3">Karawang, {{ \Carbon\Carbon::parse($data['created_at'])->locale('id_ID')->isoFormat('D MMMM Y') }} </font>
                    <br>
                    <font size="3">{!! nl2br($ttdPimpinanDataSI[0]->penanda_tangan ?? $defaultTtdData['penanda_tangan'] ?? '') !!}</font>
                    <br>
                    <div class="container">
                        <br>
                        <br>
                         <div class="left">
                             @if (isset($ttdPimpinanDataSI) && $ttdPimpinanDataSI->isNotEmpty() && isset($ttdPimpinanDataSI[0]->ttd_image))
                             <img src="{{ public_path('storage/ttd/terbaru/' . $ttdPimpinanDataSI[0]->ttd_image) }}" width="180" alt="">
                             @else
                             <img src="{{ public_path('storage/ttd/'. $defaultTtdData['ttd_image']) }}" width="180" alt="">
                             @endif
                         </div>
                    </div>
                    <br>
                    <br>
                    <br>

                    <font size="3">{{ $ttdPimpinanDataSI[0]->nama_pimpinan ?? $defaultTtdData['nama_pimpinan'] ?? '' }}
                    </font>
                    <br>
                    <font size="3">
                        {{ $ttdPimpinanDataSI[0]->nomor_induk ?? $defaultTtdData['nomor_induk'] ?? '' }}
                    </font>

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
