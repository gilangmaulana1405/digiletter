@extends('template');

@section('pageTitle')
Surat Keterangan Aktif
@endsection

@section('mainContent')
<div class="col-xl">
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Form Surat Keterangan Aktif</h5>
        </div>

        <div class="card-body">
            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form method="post" action="{{ route('suratketeranganaktif.store') }}" id="formSuratKeteranganAktif" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-fullname">Nama Mahasiswa</label>
                    <div class="input-group input-group-merge">
                        <span id="basic-icon-default-fullname2" class="input-group-text"><i class="ti ti-user"></i></span>
                        <input type="text" class="form-control alphabet-input" name="nama_mhs" id="basic-icon-default-fullname" value="{{ auth()->user()->name }}" readonly />
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-company">NPM</label>
                    <div class="input-group input-group-merge">
                        <span id="basic-icon-default-company2" class="input-group-text"><i class="ti ti-number"></i></span>
                        <input type="text" id="basic-icon-default-company" name="npm" class="form-control numeric-input npm" value="{{ auth()->user()->npm }}" readonly />
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-company">Prodi</label>
                    <div class="input-group input-group-merge">
                        <select name="prodi" id="select2IconsProdi" class="select2-icons form-select">
                            <option value="Informatika" data-icon="ti ti-notebook">Informatika</option>
                            <option value="Sistem Informasi" data-icon="ti ti-notebook">Sistem Informasi</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-company">Semester</label>
                    <div class="input-group input-group-merge">
                        <select name="semester" class="select2-icons form-select">
                            <option value="I (Satu)">I (Satu)</option>
                            <option value="II (Dua)">II (Dua)</option>
                            <option value="III (Tiga)">III (Tiga)</option>
                            <option value="IV (Empat)">IV (Empat)</option>
                            <option value="V (Lima)">V (Lima)</option>
                            <option value="VI (Enam)">VI (Enam)</option>
                            <option value="VII (Tujuh)">VII (Tujuh)</option>
                            <option value="VIII (Delapan)">VIII (Delapan)</option>
                            <option value="IX (Sembilan)">IX (Sembilan)</option>
                            <option value="X (Sepuluh)">X (Sepuluh)</option>
                            <option value="XI (Sebelas)">XI (Sebelas)</option>
                            <option value="XII (Dua Belas)">XII (Dua Belas)</option>
                            <option value="XIII (Tiga Belas)">XIII (Tiga Belas)</option>
                            <option value="XIV (Empat Belas)">XIV (Empat Belas)</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-company">Periode</label>
                    <div class="input-group input-group-merge">
                        <select name="periode" class="select2-icons form-select">
                            <option value="Gasal">Gasal</option>
                            <option value="Genap">Genap</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-company">Tahun Akademik</label>
                    <div class="input-group input-group-merge">
                        <span id="basic-icon-default-company2" class="input-group-text"><i class="ti ti-album"></i></span>
                        <input type="text" id="basic-icon-default-company" name="tahun_akademik" class="form-control" placeholder="Cth: 2023/2024" required />
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-company">Tanggal Lahir</label>
                    <div class="input-group input-group-merge">
                        <span id="basic-icon-default-company2" class="input-group-text"><i class="ti ti-calendar"></i></span>
                        <input type="date" id="basic-icon-default-company" name="tgl_lahir" class="form-control" required />
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-fullname">Alamat</label>
                    <div class="input-group input-group-merge">
                        <span id="basic-icon-default-message2" class="input-group-text"><i class="ti ti-map-pin"></i></span>
                        <textarea id="basic-icon-default-message" name="alamat" class="form-control" placeholder="" required></textarea>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-company">Upload Bukti Pembayaran (Max: 500 kb)</label>
                    <div class="input-group input-group-merge">
                        <span id="basic-icon-default-company2" class="input-group-text"><i class="ti ti-file-upload"></i></span>
                        <input type="file" class="form-control" name="bukti_pembayaran" id="inputGroupFile02" onchange="previewFile()" required>
                    </div>
                    <div id="preview-container" style="display: none; margin-top: 20px;">
                        <img id="preview-image" alt="Preview Image" style="max-width: 100%; max-height: 200px;">
                        <button id="remove-btn" onclick="removeFile()" style="display: none; margin-top: 10px;">Remove File</button>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Send</button>
            </form>
        </div>
    </div>
</div>


@endsection
