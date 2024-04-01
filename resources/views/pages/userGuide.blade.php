@extends('template');

@section('pageTitle')
User Settings
@endsection

@section('mainContent')

<h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">User /</span>
    User Guide
</h4>

<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <h4 class="card-header">Petunjuk Pemakaian</h5>
                <div class="card-body">
                    <div class="row">
                        <hr>
                        <h5>Autentikasi
            </h4>
            <hr>
            <div class="col-3 mb-4">
                <h6>Register:</h6>
                <ul class="ps-3 mb-0">
                    <li class="mb-1">
                        Klik Daftar akun
                    </li>
                    <li class="mb-1">
                        Isi form registrasi
                    </li>
                    <li class="mb-1">
                        klik tombol Daftar
                    </li>
                </ul>
            </div>
            <div class="col-3 mb-4">
                <h6>Login:</h6>
                <ul class="ps-3 mb-0">
                    <li class="mb-1">
                        Isi Form Email Dan Password
                    </li>
                    <li class="mb-1">
                        Klik tombol Masuk
                    </li>
                </ul>
            </div>
            <div class="col-3 mb-4">
                <h6>Forgot:</h6>
                <ul class="ps-3 mb-0">
                    <li class="mb-1">
                        Klik Lupa Password
                    </li>
                    <li class="mb-1">
                        Isi Form Email
                    </li>
                    <li class="mb-1">
                        Klik Kirim Link Reset
                    </li>
                </ul>
            </div>
            <div class="col-3 mb-4">
                <h6>Reset:</h6>
                <ul class="ps-3 mb-0">
                    <li class="mb-1">
                        Cek Gmail, Buka Pesan Email Dari Tu Fasilkom Unsika
                    </li>
                    <li class="mb-1">
                        Klik Reset Password
                    </li>
                    <li class="mb-1">
                        Isi Form Password Baru Dan Konfirmasi Password Baru
                    </li>
                    <li class="mb-1">
                        Klik Set Password Baru
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <hr>
            <h5>Menu Mahasiswa</h4>
                <hr>
                <div class="col-2 mb-4">
                    <h6>Pembuatan Surat:</h6>
                    <ul class="ps-3 mb-0">
                        <li class="mb-1">
                            Pilih Surat Yg Ingin Dibuat
                        </li>
                        <li class="mb-1">
                            Isi Dan Lengkapi Form
                        </li>
                        <li class="mb-1">
                            Klik Send
                        </li>
                    </ul>
                </div>
                <div class="col-3 mb-4">
                    <h6>Edit Profile:</h6>
                    <ul class="ps-3 mb-0">
                        <li class="mb-1">
                            Klik Icon User Muncul Dropdown Lalu Klik Pengaturan
                        </li>
                        <li class="mb-1">
                            Klik Tombol Data Diri
                        </li>
                        <li class="mb-1">
                            Isi Dan Lengkapi Form
                        </li>
                        <li class="mb-1">
                            Klik Update Profile
                        </li>
                    </ul>
                </div>
                <div class="col-3 mb-4">
                    <h6>Setting Akun:</h6>
                    <ul class="ps-3 mb-0">
                        <li class="mb-1">
                            Klik Icon User Muncul Dropdown Lalu Klik Pengaturan
                        </li>
                        <li class="mb-1">
                            Klik Tombol Akun </li>
                        <li class="mb-1">
                            Isi Dan Lengkapi Form
                        </li>
                        <li class="mb-1">
                            Klik Save Changes
                        </li>
                    </ul>
                </div>
                <div class="col-2 mb-4">
                    <h6>Lihat Profile:</h6>
                    <ul class="ps-3 mb-0">
                        <li class="mb-1">
                            Klik Icon User Muncul Dropdown
                        </li>
                        <li class="mb-1">
                            Klik Profile
                        </li>
                    </ul>
                </div>
                <div class="col-2 mb-4">
                    <h6>Download Surat:</h6>
                    <ul class="ps-3 mb-0">
                        <li class="mb-1">
                            Klik Riwayat Surat
                        </li>
                        <li class="mb-1">
                            Pilih Jenis Surat Yg Telah Dibuat
                        </li>
                        <li class="mb-1">
                            Klik Tombol Download Di Tabel Kolom Aktivitas
                        </li>
                    </ul>
                </div>
        </div>
    </div>
</div>
<!--/ Change Password -->
</div>
</div>
@endsection
