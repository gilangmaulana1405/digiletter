@extends('admin.template');

@section('pageTitle')
Admin Profile
@endsection

@section('mainContentAdmin')

<h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">Admin Profile /</span> Profile
</h4>

<!-- Header -->
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="user-profile-header-banner">
                <img src="{{ asset('/template/assets/img/pages/profile-banner.png') }}" alt="Banner image" class="rounded-top" />
            </div>
            <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
                <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                    <img src="{{ asset('/template/assets/img/avatars/admin_profile.png') }}" alt="user image" class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img" />
                </div>
                <div class="flex-grow-1 mt-3 mt-sm-5">
                    <div class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
                        <div class="user-profile-info">
                            <h4>{{ auth()->user()->name }}</h4>
                            <ul class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
                                <li class="list-inline-item">
                                    <i class="ti ti-color-swatch"></i> Staff TU
                                </li>
                                <li class="list-inline-item">
                                    <i class="ti ti-map-pin"></i> Universitas Singaperbangsa Karawang
                                </li>
                                <li class="list-inline-item">
                                    <i class="ti ti-calendar"></i> Joined {{ $createdAt->format('F Y') }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Header -->

<!-- Navbar pills -->
<div class="row">
    <div class="col-md-12">
        <ul class="nav nav-pills flex-column flex-sm-row mb-4">
            <li class="nav-item">
                <a class="nav-link active" href="javascript:void(0);">
                    <i class="ti-xs ti ti-user-check me-1"></i>Profile
                </a>
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
    </div>
</div>
<!--/ Navbar pills -->

<!-- Admin Profile Content -->
<div class="row">
    <div class="col-xl-4 col-lg-5 col-md-5">
        <!--About Admin -->
        <div class="card mb-4">
            <div class="card-body">
                <small class="card-text text-uppercase">About</small>
                <ul class="list-unstyled mb-4 mt-3">
                    <li class="d-flex align-items-center mb-3">
                        <i class="ti ti-user"></i><span class="fw-bold mx-2">Nama Lengkap:</span>
                        <span>{{ $user->name }}</span>
                    </li>
                    <li class="d-flex align-items-center mb-3">
                        <i class="ti ti-crown"></i><span class="fw-bold mx-2">Role:</span>
                        <span>Adminisrator</span>
                    </li>
                </ul>
                <small class="card-text text-uppercase">Contacts</small>
                <ul class="list-unstyled mb-4 mt-3">
                    <li class="d-flex align-items-center mb-3">
                        <i class="ti ti-phone-call"></i><span class="fw-bold mx-2">Contact:</span>
                        <span>adminfasilkom@unsika.ac.id</span>
                    </li>
                </ul>
            </div>
        </div>
        <!--/About Admin -->
    </div>
    <div class="col-xl-8 col-lg-7 col-md-7">
        <div class="card mb-4">
            <h5 class="card-header">Ganti Password</h5>
            <div class="card-body">
                <form id="formAccountSettings" method="POST" action="{{ route('change.password.admin', ['id' => auth()->id()]) }}">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-md-6 form-password-toggle">
                            <label class="form-label" for="current_password">Password Saat Ini</label>
                            <div class="input-group input-group-merge">
                                <input type="password" id="current_password" class="form-control" name="current_password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                <span class="input-group-text3 cursor-pointer" id="toggleCurrentPassword">
                                    <i class="ti ti-eye-off"></i>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3 col-md-6 form-password-toggle">
                            <label class="form-label" for="password">Password Baru</label>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                <span class="input-group-text cursor-pointer" id="togglePassword">
                                    <i class="ti ti-eye-off"></i>
                                </span>
                            </div>
                        </div>

                        <div class="mb-3 col-md-6 form-password-toggle">
                            <label class="form-label" for="password_confirmation">Konfirmasi Password Baru</label>
                            <div class="input-group input-group-merge">
                                <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                <span class="input-group-text2 cursor-pointer" id="toggleNewPassword">
                                    <i class="ti ti-eye-off"></i>
                                </span>
                            </div>
                        </div>

                        <div class="col-12 mb-4">
                            <h6>Ketentuan Password:</h6>
                            <ul class="ps-3 mb-0">
                                <li class="mb-1">
                                    Minimal 6 karakter panjang. Semakin banyak, semakin baik.
                                </li>
                                <li class="mb-1">
                                    Disarankan tidak mengandung password yang umum (cth: admin123).
                                </li>
                            </ul>
                        </div>

                        <div>
                            <button type="submit" class="btn btn-primary me-2">
                                Save changes
                            </button>
                            <button type="reset" class="btn btn-label-secondary">
                                Cancel
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<!--/ Admin Profile Content -->

@endsection
