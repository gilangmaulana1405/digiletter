@extends('loginTemplate')

@section('pageTitle')
Register
@endsection

@section('authPage')
<!-- Content -->

<div class="authentication-wrapper authentication-cover authentication-bg">
    <div class="authentication-inner row">
        <!-- Gambar -->
        <div class="d-none d-lg-flex col-lg-7 p-0" style="background-image: url('https://elshinta.com/asset/upload/article/2022/februari/2215_ELSHINTADOTCOM_20220208_12.jpg'); background-size: cover; height: 100vh; background-position: right top;"></div>

        <!-- Register -->
        <div class="d-flex col-12 col-lg-5 align-items-center p-sm-5 p-4" style="max-height: 100vh; overflow: hidden;">
            <div class="w-px-400 mx-auto">
                <h3 class="mb-1 fw-bold">Registrasi akun Anda di sini 🚀</h3>
                <p class="mb-4">Buat profil Anda menjadi mudah!</p>
                @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif

                <form id="formAuthentication" class="mb-3" action="{{route('regist')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama lengkap" autofocus />
                    </div>
                    <div class="mb-3">
                        <label for="npm" class="form-label">NPM</label>
                        <input type="text" class="form-control numeric-input npm" id="npm" name="npm" placeholder="Masukkan npm" autofocus />
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Cth: npm@student.unsika.ac.id" />
                    </div>
                    <div class="mb-3 form-password-toggle">
                        <label class="form-label" for="password">Password</label>
                        <div class="input-group input-group-merge">
                            <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                            <span class="input-group-text cursor-pointer" id="togglePassword">
                                <i class="ti ti-eye-off"></i>
                            </span>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary d-grid w-100">Daftar</button>
                </form>

                <p class="text-center">
                    <span>Sudah punya akun?</span>
                    <a href="{{route('login')}}">
                        <span>Silahkan masuk</span>
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
