@extends('template');

@section('pageTitle')
User Settings
@endsection

@section('mainContent')

<h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">Pengaturan /</span>
    Akun
</h4>

<div class="row">
    <div class="col-md-12">
        <ul class="nav nav-pills flex-column flex-md-row mb-4">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('user.settingAccount', auth()->user()->id) }}"><i class="ti-xs ti ti-users me-1"></i>
                    Data Diri</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="javascript:void(0);"><i class="ti-xs ti ti-lock me-1"></i>
                    Akun</a>
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
        <!-- Change Password -->
        <div class="card mb-4">
            <h5 class="card-header">Ganti Password</h5>
            <div class="card-body">
                <form id="formAccountSettings" method="POST" action="{{ route('change.password', ['id' => auth()->id()]) }}">
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
                                    Disarankan tidak mengandung unsur NPM dalam penggunaan password.
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
        <!--/ Change Password -->
    </div>
</div>
@endsection
