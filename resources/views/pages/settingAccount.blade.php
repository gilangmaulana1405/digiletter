@extends('template');

@section('pageTitle')
User Settings
@endsection

@section('mainContent')

<h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">Pengaturan /</span>
    Data Diri
</h4>

<div class="row">
    <div class="col-md-12">
        <ul class="nav nav-pills flex-column flex-md-row mb-4">
            <li class="nav-item">
                <a class="nav-link active" href="javascript:void(0);"><i class="ti-xs ti ti-users me-1"></i>
                    Data Diri</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('user.settingSecurity', ['id'=> auth()->user()->id]) }}"><i class="ti-xs ti ti-lock me-1"></i> Akun</a>
            </li>

            <li class="nav-item mx-3">
                {{-- validasi error di session --}}
                @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>

                {{-- validasi error $request->validate() --}}
                @elseif($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </li>
        </ul>

        {{-- lengkapi profile --}}
        <!-- Lengkapi Profile -->
        <div class="card card-action mb-4">
            <div class="card-header align-items-center">
                <h5 class="card-action-title mb-0">Lengkapi Profile</h5>
            </div>
            <form method="post" action="{{ route('user.lengkapiprofile',  ['id' => auth()->id()]) }}" enctype="multipart/form-data">
                @csrf
                <!-- Account -->
                <div class="card-body">
                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                        <img src="{{ asset('storage/foto-mahasiswa/' . $user->mahasiswa->foto) ?? '' }}" alt="user-avatar" class="d-block w-px-100 h-px-100 rounded" id="uploadedAvatar" />
                        <div class="button-wrapper">
                            <label for="upload" class="btn btn-primary me-2 mb-3" tabindex="0">
                                <span class="d-none d-sm-block">Upload new photo</span>
                                <i class="ti ti-upload d-block d-sm-none"></i>
                                <input type="file" name="foto" id="upload" class="account-file-input" hidden accept="image/png, image/jpeg" />
                            </label>
                            <button type="button" class="btn btn-label-secondary account-image-reset mb-3" onclick="resetFileInput()">
                                <i class="ti ti-refresh-dot d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Reset</span>
                            </button>
                            <div class="text-muted">
                                Mengizinkan format JPG, SVG, atau PNG. Ukuran maksimal 1MB.
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="my-0" />
                <div class="card-body pb-0">
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-fullname">Nama Mahasiswa</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"></span>
                            <input type="text" class="form-control alphabet-input" name="nama_mhs" id="basic-icon-default-fullname" value="{{ auth()->user()->name }}" />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-company">NPM</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-company2" class="input-group-text"></span>
                            <input type="text" id="basic-icon-default-company" name="npm" class="form-control numeric-input npm" value="{{ auth()->user()->npm }}" />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-company">Semester</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-company2" class="input-group-text"></span>
                            <input type="number" id="basic-icon-default-company" name="semester" class="form-control numeric-input" value="{{ $user->mahasiswa->semester ?? '' }}" />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-fullname">Prodi</label>
                        <div class="input-group input-group-merge">
                            <select name="prodi" class="select2-icons form-select">
                                <option value="Informatika" data-icon="ti ti-notebook">Informatika</option>
                                <option value="Sistem Informasi" data-icon="ti ti-notebook">Sistem Informasi</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-company">Domisili</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-company2" class="input-group-text"></span>
                            <input type="text" id="basic-icon-default-company" name="domisili" class="form-control" value="{{ $user->mahasiswa->domisili ?? '' }}" />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-fullname">Jenis Kelamin</label>
                        <div class="input-group input-group-merge">
                            <select name="jenis_kelamin" class="select2-icons form-select">
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-fullname">Status</label>
                        <div class="input-group input-group-merge">
                            <select name="status" class="select2-icons form-select">
                                <option value="Aktif">Aktif</option>
                                <option value="Lulus">Lulus</option>
                                <option value="Drop Out">Drop Out</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-phone">No HP</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-phone2" class="input-group-text"></span>
                            <input type="number" id="basic-icon-default-phone" name="no_hp" class="form-control phone-mask numeric-input" value="{{ $user->mahasiswa->no_hp ?? '' }}" />
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Profile</button>
            </form>
        </div>
    </div>
</div>
@endsection
