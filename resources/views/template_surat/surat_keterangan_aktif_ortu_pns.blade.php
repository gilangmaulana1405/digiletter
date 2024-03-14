<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Keterangan Aktif Kuliah Orang Tua PNS</title>
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
            margin-top: -15px;
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
            bottom: -90px;
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
                    <font size="3">SURAT PERNYATAAN MASIH AKTIF KULIAH</font>
                </td>
            </tr>
            <tr>
                <td>
                    <font size="3">Nomor : {{ $data['nomor_surat'] }}</font>
                </td>
            </tr>
        </table>

        <br>

        <!-- yg bertanda tangan -->
        <table border="0" width="500" cellpadding="0">
            <tr>
                <td>
                    <font size="3">Yang bertanda tangan dibawah ini:</font>
                </td>
            </tr>
        </table>
        <br>
        <table border="0" width="400" cellpadding="0">
            <tr>
                <td>
                    <font size="3">Nama</font>
                </td>
                <td>:</td>
                <td>
                    <font size="3">Nina Sulistiyowati, ST., M.Kom</font>
                </td>
            </tr>
            <tr>
                <td>
                    <font size="3">NIDN/NIP</font>
                </td>
                <td>:</td>
                <td>
                    <font size="3">198302092021212006</font>
                </td>
            </tr>
            <tr>
                <td>
                    <font size="3">Jabatan</font>
                </td>
                <td>:</td>
                <td>
                    <font size="3">Wakil Dekan Bidang Akademik dan Kemahasiswaan</font>
                </td>
            </tr>
            <tr>
                <td width="170">
                    <font size="3">Fakultas</font>
                </td>
                <td>:</td>
                <td>
                    <font size="3">Ilmu Komputer</font>
                </td>
            </tr>
        </table>
        <br>

        <!-- menyatakan bahwa -->
        <table border="0" width="500">
            <tr>
                <td>
                    <font size="3">Dengan ini menyatakan bahwa:</font>
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
                    <font size="3">Program Studi</font>
                </td>
                <td>:</td>
                <td>
                    <font size="3">S1 - {{ $data['prodi'] }}</font>
                </td>
            </tr>
            <tr>
                <td>
                    <font size="3">Nomor Pokok</font>
                </td>
                <td>:</td>
                <td>
                    <font size="3">{{ $data['npm'] }}</font>
                </td>
            </tr>
            <tr>
                <td width="170">
                    <font size="3">Semester/Program</font>
                </td>
                <td>:</td>
                <td>
                    <font size="3">{{ $data['semester'] }}/Sarjana (S1)</font>
                </td>
            </tr>
            <tr>
                <td>
                    <font size="3">Alamat</font>
                </td>
                <td>:</td>
                <td>
                    <font size="3">{{ $data['alamat'] }}</font>
                </td>
            </tr>
        </table>
        <br>
        <!-- wali/ortu -->
        <table border="0" width="500">
            <tr>
                <td>
                    <font size="3">Wali/Orang Tua mahasiswa tersebut:</font>
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
                    <font size="3">{{ $data['nama_ortu'] }}</font>
                </td>
            </tr>
            <tr>
                <td>
                    <font size="3">NIP/NRP/No.Pensiun</font>
                </td>
                <td>:</td>
                <td>
                    <font size="3">{{ $data['nomor_induk_ortu'] }}</font>
                </td>
            </tr>
            <tr>
                <td>
                    <font size="3">Pangkat/Golongan</font>
                </td>
                <td>:</td>
                <td>
                    <font size="3">{{ $data['jabatan_ortu'] }}</font>
                </td>
            </tr>
            <tr>
                <td width="170">
                    <font size="3">Instansi</font>
                </td>
                <td>:</td>
                <td>
                    <font size="3">{{ $data['instansi'] }}</font>
                </td>
            </tr>
        </table>
        <br>
        <br>
        <table border="0" width="500">
            <tr>
                <td>
                    <font size="3">Adalah benar mahasiswa kami yang masih aktif pada tahun akademik 2024/2024. Apabila
                        dikemudian hari surat pernyataan ini terdapat kesalahan yang mengakibatkan kerugian terhadap
                        Negara Republik Indonesia, maka kerugian tersebut menjadi tanggung jawab orang tua/wali
                        mahasiswa tersebut diatas.</font>
                </td>
            </tr>
        </table>
        <br>

        <table border="0" width="500">
            <tr>
                <td>
                    <font size="3">Demikian Surat Keterangan ini kami buat dengan sesungguhnya, untuk dapat dipergunakan
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
                    <font size="3">{!! nl2br($ttdPimpinanDataWadek[0]->penanda_tangan ?? $defaultTtdData['penanda_tangan'] ?? '') !!}</font>
                    <br>
                    <div class="container">
                        <br>
                        <br>
                        <div class="left">
                            @if (isset($ttdPimpinanDataWadek) && $ttdPimpinanDataWadek->isNotEmpty() && isset($ttdPimpinanDataWadek[0]->ttd_image))
                            <img src="{{ public_path('storage/ttd/terbaru/' . $ttdPimpinanDataWadek[0]->ttd_image) }}" width="180" alt="">
                            @else
                            <img src="{{ public_path('storage/ttd/'. $defaultTtdData['ttd_image']) }}" width="180" alt="">
                            @endif
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>

                    <font size="3">{{ $ttdPimpinanDataWadek[0]->nama_pimpinan ?? $defaultTtdData['nama_pimpinan'] ?? '' }}
                    </font>
                    {{-- <font size="3">Nina Sulistiyowati, ST., M.Kom.</font> --}}
                    <br>
                    {{-- <font size="3">NIP : 198302092021212006</font> --}}
                    <font size="3">
                        {{ $ttdPimpinanDataWadek[0]->nomor_induk ?? $defaultTtdData['nomor_induk'] ?? '' }}
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
