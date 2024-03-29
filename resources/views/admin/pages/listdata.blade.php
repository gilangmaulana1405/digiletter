@extends('admin.template');

@section('pageTitle')
List Data Surat
@endsection

@section('mainContentAdmin')

<div class="col-xl">

    <div class="row">
        <div class="col-md-5">
            <div class="alert alert-info position-relative" role="alert">
                <h4 class="alert-heading">Informasi!</h4>
                <ul>
                    <li>Jangan lupa ketika klik tombol preview (icon mata warna biru), matikan internet download manager
                        (idm) agar dapat preview surat.</li>
                    <li>Disarankan ukuran layar 90%.</li>
                </ul>
                <button type="button" class="btn-close position-absolute top-0 end-0" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
    <!-- Column Search -->
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Daftar {{ $jenisSurat }}</h5>
            @if(request()->is('admin/listdata/suratizinpenelitian'))
            <a href="{{ route('export-surat-izin-penelitian') }}" class="btn btn-success">Export Excel</a>
            @elseif(request()->is('admin/listdata/suratketeranganaktif'))
            <a href="{{ route('export-surat-keterangan-aktif') }}" class="btn btn-success">Export Excel</a>
            @elseif(request()->is('admin/listdata/suratketeranganaktifortupns'))
            <a href="{{ route('export-surat-keterangan-aktif-ortu-pns') }}" class="btn btn-success">Export Excel</a>
            @elseif(request()->is('admin/listdata/suratbebaspustaka'))
            <a href="{{ route('export-surat-bebas-pustaka') }}" class="btn btn-success">Export Excel</a>
            @elseif(request()->is('admin/listdata/suratpengajuancuti'))
            <a href="{{ route('export-surat-pengajuan-cuti') }}" class="btn btn-success">Export Excel</a>
            @endif
        </div>
        <div class="card-datatable table-responsive pt-0">
            <table id="listdata" class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th width="40">Nomor Surat</th>
                        <th>Tanggal Masuk</th>
                        <th>Nama Mahasiswa</th>
                        <th>NPM</th>
                        <th>Prodi</th>
                        <th>Lampiran</th>
                        <th style="width:200px;">Aktivitas</th>
                        <th>Tanggal Approve</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $d)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $d->nomor_surat }}</td>
                        <td>{{ \Carbon\Carbon::parse($d->created_at)->locale('id_ID')->isoFormat('D MMMM Y') }}</td>
                        <td>{{ $d->nama_mhs }}</td>
                        <td>{{ $d->npm }}</td>
                        <td>{{ $d->prodi }}</td>
                        <td>
                            @if($d->bukti_pembayaran)
                            <img src="{{ asset('storage/bukti-pembayaran/' . $d->bukti_pembayaran) }}" class="img-thumbnail" alt="Bukti Pembayaran" style="max-width: 80px;" data-bs-toggle="modal" data-bs-target="#gambarModalBuktiPembayaran" onclick="showModalBuktiPembayaran('{{ asset('storage/bukti-pembayaran/' . $d->bukti_pembayaran) }}')">
                            @else
                            <p class="text-center">-</p>
                            @endif
                        </td>
                        <td>
                            @php
                            if ($d->jenis_surat == 'Surat Izin Penelitian') {
                            $folder = 'surat-izin-penelitian';
                            } elseif ($d->jenis_surat == 'Surat Keterangan Aktif Kuliah') {
                            $folder = 'surat-keterangan-aktif';
                            }
                            elseif ($d->jenis_surat == 'Surat Keterangan Aktif Kuliah Ortu PNS') {
                            $folder = 'surat-keterangan-aktif-ortu-pns';
                            }
                            elseif ($d->jenis_surat == 'Surat Bebas Pustaka') {
                            $folder = 'surat-bebas-pustaka';
                            }
                            elseif ($d->jenis_surat == 'Surat Pengajuan Cuti') {
                            $folder = 'surat-pengajuan-cuti';
                            }
                            else {
                            $folder = '';
                            }
                            @endphp
                            <a href="#" class="btn btn-outline-info btn-sm" onclick="openPdfPreview('{{ route('surat-preview', ['folders' => $folder, 'file_path' => $d->file_path]) }}')">
                                <i class="fa-solid fa-eye"></i>
                            </a>

                            {{-- approval --}}
                            @if($d instanceof App\Models\SuratIzinPenelitian)

                            @php
                            $setujuiRoute = "/setujui-surat-izin-penelitian/{$d->id}";
                            $tidakSetujuRoute = "/tidaksetuju-surat-izin-penelitian/{$d->id}";
                            $cancelRoute = "/cancelsurat-izin-penelitian/{$d->id}";
                            @endphp

                            @elseif($d instanceof App\Models\SuratKeteranganAktif)
                            @php
                            $setujuiRoute = "/setujui-surat-keterangan-aktif/{$d->id}";
                            $tidakSetujuRoute = "/tidaksetuju-surat-keterangan-aktif/{$d->id}";
                            $cancelRoute = "/cancelsurat-keterangan-aktif/{$d->id}";
                            @endphp

                            @elseif($d instanceof App\Models\SuratKeteranganAktifOrtuPns)
                            @php
                            $setujuiRoute = "/setujui-surat-keterangan-aktif-ortu-pns/{$d->id}";
                            $tidakSetujuRoute = "/tidaksetuju-surat-keterangan-aktif-ortu-pns/{$d->id}";
                            $cancelRoute = "/cancelsurat-keterangan-aktif-ortu-pns/{$d->id}";
                            @endphp

                            @elseif($d instanceof App\Models\SuratBebasPustaka)
                            @php
                            $setujuiRoute = "/setujui-surat-bebas-pustaka/{$d->id}";
                            $tidakSetujuRoute = "/tidaksetuju-surat-bebas-pustaka/{$d->id}";
                            $cancelRoute = "/cancelsurat-bebas-pustaka/{$d->id}";
                            @endphp

                            @elseif($d instanceof App\Models\SuratPengajuanCuti)
                            @php
                            $setujuiRoute = "/setujui-surat-pengajuan-cuti/{$d->id}";
                            $tidakSetujuRoute = "/tidaksetuju-surat-pengajuan-cuti/{$d->id}";
                            $cancelRoute = "/cancelsurat-pengajuan-cuti/{$d->id}";
                            @endphp

                            @else

                            @endif

                            @if(!$d->status == 'disetujui' || !$d->status == 'ditolak')

                            {{-- button surat disetujui --}}
                            <button type="submit" style="display: none;" class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#myModalApprove-{{$d->id}}">
                                <i class="fa-solid fa-circle-check"></i>
                            </button>

                            {{-- button surat ditolak --}}
                            <button type="submit" style="display: none;" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#myModal-{{$d->id}}">
                                <i class="fa-solid fa-circle-xmark"></i>
                            </button>

                            @else
                            {{-- button cancel --}}
                            <form action="{{ $cancelRoute }}" method="POST" class="d-inline ms-2 align-top">
                                @csrf
                                @method('DELETE')
                                <button onclick="cancelSuratTugas()" class="btn btn-sm">
                                    <span class="badge rounded-pill bg-warning">Cancel</span>
                                </button>
                            </form>
                            @endif
                        </td>
                        <td>
                            @if($d->status === 'disetujui')
                            {{ \Carbon\Carbon::parse($d->updated_at)->locale('id_ID')->isoFormat('D MMMM Y') }}
                            @endif
                        </td>
                        <td>
                            @if($d->status == 'disetujui')
                            <span class="badge badge-sm rounded-pill bg-label-success">Disetujui</span>

                            @elseif($d->status == 'ditolak')
                            <span class="badge badge-sm rounded-pill bg-label-danger">Ditolak</span>

                            @else
                            @endif
                        </td>
                    </tr>

                    {{-- Modal Approve --}}
                    <div class="modal fade" id="myModalApprove-{{$d->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Nomor Surat</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Form inside the modal -->
                                    <form action="{{ $setujuiRoute }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="text-input" class="form-label">Masukkan
                                                Nomor Surat:</label>
                                            <input type="text" class="form-control" id="text-input" name="nomor_surat" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Reject -->
                    <div class="modal fade" id="myModal-{{$d->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Keterangan Reject</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Form inside the modal -->
                                    <form action="{{ $tidakSetujuRoute }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="text-input" class="form-label">Masukkan
                                                Keterangan:</label>
                                            <input type="text" class="form-control" id="text-input" name="text_input" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal untuk menampilkan PDF -->
                    <div class="modal fade" id="pdfPreviewModal" tabindex="-1" role="dialog" aria-labelledby="pdfPreviewModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="pdfPreviewModalLabel">PDF Preview</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <iframe id="pdfPreviewFrame" width="100%" height="500px"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Bukti Pembayaran -->
                    <div class="modal fade" id="gambarModalBuktiPembayaran" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Gambar Bukti Pembayaran</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <img src="" id="modalImageBuktiPembayaran" class="img-fluid" alt="Bukti Pembayaran" style="max-height: 100%; width: 100%;">
                                            </div>
                                            <div class="col-md-4">
                                                <ul class="list-group">
                                                    <li class="list-group-item active" aria-current="true">Data Mahasiswa</li>
                                                    <li class="list-group-item">Nama : {{ $d->nama_mhs }}</li>
                                                    <li class="list-group-item">NPM : {{ $d->npm }}</li>
                                                    <li class="list-group-item">Prodi : {{ $d->prodi }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!--/ Column Search -->
</div>

<script>
    // reload halaman otomatis setiap 2 jam
    function refreshPage() {
        location.reload(true);
    }
    setInterval(refreshPage, 7200000); // 2 jam = 7200000 milidetik

</script>

<script>
    function showModalBuktiPembayaran(imageUrl) {
        document.getElementById('modalImageBuktiPembayaran').src = imageUrl;
    }

</script>

@endsection
