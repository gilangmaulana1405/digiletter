@extends('template');

@section('pageTitle')
Home
@endsection

@section('mainContent')
<div class="col-lg mb-4">
    <div class="container-xxl">
        <h4 class="fw-bold mb-4"><span class="text-muted fw-light">Home /</span> Pembuatan Surat</h4>
        <!-- Examples -->
        <div class="row mb-5">
            <div class="col-lg-4 mb-3">
                <div class="card h-100">
                    <img class="card-img-top" src="{{ asset('/template/assets/img/backgrounds/surat-izin-penelitian.png') }}" alt="Surat Izin Penelitian" height="250" />
                    <div class="card-body">
                        <h5 class="card-title">Surat Izin Penelitian</h5>
                        <p class="card-text">
                            Surat Izin Penelitian diperlukan ketika seorang mahasiswa akan melakukan penelitian, baik untuk tugas akhir atau proyek khusus. Surat ini berisi permohonan izin kepada pihak terkait.
                        </p>
                        <br>
                        <br>
                        <a href="{{ route('suratizinpenelitian.create', ['id' => auth()->id()]) }}" class="btn btn-secondary">Buat Surat</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-3">
                <div class="card h-100">
                    <img class="card-img-top" src="{{ asset('/template/assets/img/backgrounds/surat-keterangan-aktif-kuliah.png') }}" alt="Surat Keterangan Aktif Kuliah" height="250" />
                    <div class="card-body">
                        <h5 class="card-title">Surat Keterangan Aktif Kuliah</h5>
                        <p class="card-text">
                            Surat Keterangan Aktif digunakan untuk menyatakan bahwa seseorang masih aktif sebagai mahasiswa di suatu perguruan tinggi.
                        </p>
                        <br>
                        <br>
                        <br>
                        <a href="{{ route('suratketeranganaktif.create', ['id' => auth()->id()]) }}" class="btn btn-secondary">Buat Surat</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-3">
                <div class="card">
                    <img class="card-img-top" src="{{ asset('/template/assets/img/backgrounds/surat-keterangan-aktif-kuliah-ortu-pns.png') }}" alt="Surat Keterangan Aktif Kuliah (Orang Tua PNS)" height="250" />
                    <div class="card-body">
                        <h5 class="card-title">Surat Keterangan Aktif Kuliah (Orang Tua PNS)</h5>
                        <p class="card-text">
                            Surat Keterangan Aktif (Orang Tua PNS) khusus diperuntukkan bagi mahasiswa yang orang tuanya merupakan Pegawai Negeri Sipil (PNS). Surat ini umumnya diperlukan untuk keperluan administrasi tertentu.
                        </p>
                        <br>
                        <a href="{{ route('suratketeranganaktifortupns.create', ['id' => auth()->id()]) }}" class="btn btn-secondary">Buat Surat</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-3">
                <div class="card h-100">
                    <img class="card-img-top" src="{{ asset('/template/assets/img/backgrounds/surat-bebas-pustaka.png') }}" alt="Surat Bebas Pustaka" height="250" />
                    <div class="card-body">
                        <h5 class="card-title">Surat Bebas Pustaka</h5>
                        <p class="card-text">
                            Surat Bebas Pustaka diperlukan sebagai bukti bahwa seorang mahasiswa telah mengembalikan semua buku perpustakaan yang dipinjam.
                        </p>
                        <br>
                        <br>
                        <br>
                        <a href="{{ route('suratbebaspustaka.create', ['id' => auth()->id()]) }}" class="btn btn-secondary">Buat Surat</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-3">
                <div class="card h-100">
                    <img class="card-img-top" src="{{ asset('/template/assets/img/backgrounds/surat-pengajuan-cuti.png') }}" alt="Surat Keterangan Cuti" height="250" />
                    <div class="card-body">
                        <h5 class="card-title">Surat Pengajuan Cuti</h5>
                        <p class="card-text">
                            Surat pengajuan cuti digunakan untuk memohon izin cuti dari kegiatan akademis. Surat ini umumnya berisi alasan yang jelas dan mendalam mengenai keperluan cuti, seperti masalah kesehatan, kebutuhan pribadi, atau keterlibatan dalam proyek atau aktivitas luar kurikulum yang signifikan.
                        </p>
                        <a href="{{ route('suratpengajuancuti.create', ['id' => auth()->id()]) }}" class="btn btn-secondary">Buat Surat</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
