@extends('template');

@section('pageTitle')
Surat Izin Penelitian
@endsection

@section('mainContent')
<div class="col-xl">
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Form Surat Izin Penelitian</h5>
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

            <form method="post" action="{{ route('suratizinpenelitian.store') }}" id="formSuratIzinPenelitian">
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
                    <label class="form-label" for="basic-icon-default-company">Lingkup</label>
                    <div class="input-group input-group-merge">
                        <select name="lingkup" id="select2IconsLingkup" class="select2-icons form-select">
                            <option value="Internal" data-icon="ti ti-layers-intersect-2">Internal</option>
                            <option value="Eksternal" data-icon="ti ti-layers-intersect-2">Eksternal</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-company">Semester</label>
                    <div class="input-group input-group-merge">
                        <span id="basic-icon-default-company2" class="input-group-text"><i class="ti ti-numbers"></i></span>
                        <input type="number" id="basic-icon-default-company" name="semester" class="form-control numeric-input" value="{{ $data->mahasiswa->semester }}" />
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-fullname">Tujuan Surat</label>
                    <div class="input-group input-group-merge">
                        <span id="basic-icon-default-fullname2" class="input-group-text"><i class="ti ti-drag-drop"></i></span>
                        <input type="text" class="form-control alphabet-input" name="tujuan_surat" id="basic-icon-default-fullname" placeholder="Cth: Kepala Dinas Perhubungan/HRD PT. Angin Ribut/Manajer Plaza Cafe" />
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-fullname">Tujuan Instansi</label>
                    <div class="input-group input-group-merge">
                        <span id="basic-icon-default-fullname2" class="input-group-text"><i class="ti ti-location"></i></span>
                        <input type="text" class="form-control alphabet-input" name="tujuan_instansi" id="basic-icon-default-fullname" placeholder="Cth: Dinas Perhubungan/Plaza Cafe/PT. Angin Ribut" />
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-fullname">Domisili Instansi</label>
                    <div class="input-group input-group-merge">
                        <span id="basic-icon-default-fullname2" class="input-group-text"><i class="ti ti-map-pin"></i></span>
                        <input type="text" class="form-control alphabet-input" name="domisili_instansi" id="basic-icon-default-fullname" placeholder="Cth: Kabupaten Karawang/ Kota Bekasi" />
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-fullname">Judul Penelitian</label>
                    <div class="input-group input-group-merge">
                        <span id="basic-icon-default-message2" class="input-group-text"><i class="ti ti-book"></i></span>
                        <textarea id="basic-icon-default-message" name="judul_penelitian" class="form-control" placeholder="" required></textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Send</button>
            </form>
        </div>
    </div>
</div>


@endsection
