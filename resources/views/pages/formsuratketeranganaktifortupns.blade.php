@extends('template');

@section('pageTitle')
Surat Keterangan Aktif Ortu PNS
@endsection

@section('mainContent')
<div class="col-xl">
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Form Surat Keterangan Aktif Ortu PNS</h5>
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

            <form method="post" action="{{ route('suratketeranganaktifortupns.store') }}" id="formSuratKeteranganAktifOrtuPns">
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
                        <select name="semester" id="select2IconsSemester" class="select2-icons form-select">
                            <option value="I (Satu)" data-icon="ti ti-tallymarks">I (Satu)</option>
                            <option value="II (Dua)" data-icon="ti ti-tallymarks">II (Dua)</option>
                            <option value="III (Tiga)" data-icon="ti ti-tallymarks">III (Tiga)</option>
                            <option value="IV (Empat)" data-icon="ti ti-tallymarks">IV (Empat)</option>
                            <option value="V (Lima)" data-icon="ti ti-tallymarks">V (Lima)</option>
                            <option value="VI (Enam)" data-icon="ti ti-tallymarks">VI (Enam)</option>
                            <option value="VII (Tujuh)" data-icon="ti ti-tallymarks">VII (Tujuh)</option>
                            <option value="VIII (Delapan)" data-icon="ti ti-tallymarks">VIII (Delapan)</option>
                            <option value="X (Sepuluh)" data-icon="ti ti-tallymarks">X (Sepuluh)</option>
                        </select>
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
                    <label class="form-label" for="basic-icon-default-company">Nama Orang Tua</label>
                    <div class="input-group input-group-merge">
                        <span id="basic-icon-default-company2" class="input-group-text"><i class="ti ti-user"></i></span>
                        <input type="text" id="basic-icon-default-company" name="nama_ortu" class="form-control alphabet-input" />
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-company">Nomor Induk Orang Tua</label>
                    <div class="input-group input-group-merge">
                        <span id="basic-icon-default-company2" class="input-group-text"><i class="ti ti-number"></i></span>
                        <input type="text" id="basic-icon-default-company" name="nomor_induk_ortu" class="form-control numeric-input" />
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-company">Pangkat/Golongan</label>
                    <div class="input-group input-group-merge">
                        <span id="basic-icon-default-company2" class="input-group-text"><i class="ti ti-badge"></i></span>
                        <input type="text" id="basic-icon-default-company" name="jabatan_ortu" class="form-control" placeholder="Cth: IV A/Pembina" />
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-company">Instansi</label>
                    <div class="input-group input-group-merge">
                        <span id="basic-icon-default-company2" class="input-group-text"><i class="ti ti-building-skyscraper"></i></span>
                        <input type="text" id="basic-icon-default-company" name="instansi" class="form-control" placeholder="Cth: Kementrian Pendidikan, Kebudayaan, Pendidikan, Riset Teknologi" />
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Send</button>
            </form>
        </div>
    </div>
</div>


@endsection
