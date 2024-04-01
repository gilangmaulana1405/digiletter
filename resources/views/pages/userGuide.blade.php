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
                        <h5>Autentikasi</h4>
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
                                    Isi form email dan password
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
                                 Isi form email
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
                                    Cek gmail, buka pesan email dari TU Fasilkom Unsika
                                </li>
                                <li class="mb-1">
                                    Klik Reset Password
                                </li>
                                <li class="mb-1">
                                    Isi form password baru dan konfirmasi password baru
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
                                    Pilih surat yang ingin dibuat
                                </li>
                                <li class="mb-1">
                                   Isi dan fengkapi form
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
                                     Klik gambar profil user pojok kanan atas muncul dropdown lalu klik Pengaturan
                                </li>
                                <li class="mb-1">
                                 Klik tombol data diri
                                </li>
                                <li class="mb-1">
                                 Isi dan lengkapi form
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
                                      Klik gambar profil user pojok kanan atas muncul dropdown  lalu klik Pengaturan
                                </li>
                                <li class="mb-1">
                                 Klik tombol Akun                                 </li>
                                 <li class="mb-1">
                                 Isi dan lengkapi form
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
                                     Klik gambar profil user pojok kanan atas muncul dropdown 
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
                                   Pilih jenis surat yang telah dibuat
                                </li>
                                <li class="mb-1">
                                   Klik tombol Download di tabel kolom aktivitas
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
