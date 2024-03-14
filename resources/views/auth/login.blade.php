@extends('loginTemplate')

@section('pageTitle')
Login
@endsection

@section('authPage')
<div class="authentication-wrapper authentication-cover authentication-bg" style="background-image: url('https://elshinta.com/asset/upload/article/2022/februari/2215_ELSHINTADOTCOM_20220208_12.jpg'); background-size: cover; height: 100vh;">
    <div class="authentication-inner row">
        <!-- Login -->
        <div class="auth-cover-bg auth-cover-bg-color d-flex justify-content-center align-items-center" style="width: 500px; height: 500px; margin: auto;">
            <div class="w-px-400 mx-auto">
                <div class="row">
                    <div class="col text-center">
                        <div class="mb-2">
                            <img src="{{ asset('/template/assets/img/branding/e-letter-logo.png') }}" alt="E-Letter" width="180" height="85" align="center">
                        </div>
                        <h3 class="mb-1 fw-bold">TU Fasilkom Unsika</h3>
                        {{-- regist berhasil --}}
                        @if (session('success'))
                        <div class="alert alert-success">
                            <b> {{ session('success') }} </b>
                        </div>
                        @endif

                        {{-- reset password berhasil --}}
                        @if(session()->get('status'))
                        <div class="alert alert-success">
                            {{ session()->get('status') }}
                        </div>
                        @endif

                        <p class="mb-4">Silakan masuk ke akun Anda</p>

                        {{-- login gagal --}}
                        @if (session('error'))
                        <div class="alert alert-danger">
                            <b>Opps!</b> {{ session('error') }}
                        </div>
                        @endif
                    </div>
                </div>

                <form id="formAuthentication" class="mb-3" action="{{route('postlogin')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Masukkan email" autofocus />
                    </div>
                    <div class="mb-3 form-password-toggle">
                        <div class="d-flex justify-content-between">
                            <label class="form-label" for="password">Password</label>
                            <a href="{{route('forgot-pw')}}">
                                <small>Lupa Password?</small>
                            </a>
                        </div>
                        <div class="input-group input-group-merge">
                            <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                            <span class="input-group-text cursor-pointer" id="togglePassword">
                                <i class="ti ti-eye-off"></i>
                            </span>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary d-grid w-100">Masuk</button>
                </form>

                <p class="text-center">
                    <span>Belum punya akun?</span>
                    <a href="{{route('regist')}}">
                        <span>Daftar akun</span>
                    </a>
                </p>
            </div>
        </div>
        <!-- /Login -->
    </div>
</div>
@endsection
