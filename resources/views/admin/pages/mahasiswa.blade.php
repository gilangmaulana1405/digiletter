@extends('admin.template');

@section('pageTitle')
Data Mahasiswa
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
    <div class="row">
        <div class="col-md-5">
            {{-- validasi error di session --}}
            @if(session('error'))
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                {{ session('error') }}
            </div>
            {{-- validasi error $request->validate() --}}
            @elseif($errors->any())
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
    </div>
    <!-- Column Search -->
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0"> <a href="/admin" class="me-2" style="font-size:24px;"><i class="ti ti-arrow-narrow-left"></i></a> Daftar {{ $title }}</h5>

            <a href="#" class="btn btn-info btn-md" data-bs-toggle="modal" data-bs-target="#myModalAddMhs">
                Add Mahasiswa
            </a>
        </div>
        <div class="card-datatable table-responsive pt-0">
            <table id="mahasiswa" class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Mahasiswa</th>
                        <th>NPM</th>
                        <th>Semester</th>
                        <th>Prodi</th>
                        <th>Domisili</th>
                        <th>Jenis Kelamin</th>
                        <th>No HP</th>
                        <th>Status Mahasiswa</th>
                        {{-- <th>Foto</th> --}}
                        <th style="width:400px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $d)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $d->user ? $d->user->name : 'Not register' }}</td>
                        <td>{{ $d['npm'] }}</td>
                        <td>{{ $d['semester'] }}</td>
                        <td>{{ $d['prodi'] }}</td>
                        <td>{{ $d['domisili'] }}</td>
                        <td>{{ $d['jenis_kelamin'] }}</td>
                        <td>{{ $d['no_hp'] }}</td>
                        <td>{{ $d['status'] }}</td>
                        {{-- <td>
                            @if($d['foto'])
                            <img src="{{ asset('storage/foto-mahasiswa/' . $d['foto']) }}" class="img-thumbnail" alt="Foto Mahasiswa" style="max-width: 80px;" data-bs-toggle="modal" data-bs-target="#gambarModalFotoMahasiswa" onclick="showModalFotoMahasiswa('{{ asset('storage/foto-mahasiswa/' . $d['foto']) }}')">
                            @else
                            <p class="text-center">-</p>
                            @endif
                        </td> --}}
                        <td>
                            <button type="submit" style="display: none;" class="btn btn-outline-warning btn-sm" data-bs-toggle="modal" data-bs-target="#myModalEditMhs-{{$d['id']}}">
                                <i class="fa-solid fa-edit"></i>
                            </button>
                            <button type="submit" style="display: none;" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#myModalDeleteMhs-{{$d['id']}}">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </td>
                    </tr>

                    {{-- Modal Add --}}
                    <div class="modal fade" id="myModalAddMhs" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Mahasiswa</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('add.mahasiswa') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label" for="basic-icon-default-company">NPM</label>
                                            <div class="input-group input-group-merge">
                                                <span id="basic-icon-default-company2" class="input-group-text"></span>
                                                <input type="text" id="basic-icon-default-company" name="npm" class="form-control numeric-input npm" required />
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
                                            <label for="text-input" class="form-label">Status Mahasiswa:</label>
                                            <select name="status" class="select2-icons form-select">
                                                <option value="Aktif">Aktif</option>
                                                <option value="Lulus">Lulus</option>
                                                <option value="Drop Out">Drop Out</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Modal Edit --}}
                    <div class="modal fade" id="myModalEditMhs-{{$d['id']}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Mahasiswa</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Form inside the modal -->
                                    <form action="{{ route('edit.mahasiswa', $d['id']) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="id" value="{{ $d['id'] }}">
                                        <div class="mb-3">
                                            <label class="form-label" for="basic-icon-default-company">NPM</label>
                                            <div class="input-group input-group-merge">
                                                <span id="basic-icon-default-company2" class="input-group-text"></span>
                                                <input type="text" class="form-control" name="npm" value="{{ $d['npm'] }}" />
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="basic-icon-default-fullname">Prodi</label>
                                            <div class="input-group input-group-merge">
                                                <select name="prodi" class="select2-icons form-select">
                                                    <option value="Informatika" data-icon="ti ti-notebook" {{ old('prodi', $d['prodi']) == 'Informatika' ? 'selected' : '' }}>
                                                        Informatika
                                                    </option>
                                                    <option value="Sistem Informasi" data-icon="ti ti-notebook" {{ old('prodi', $d['prodi']) == 'Sistem Informasi' ? 'selected' : '' }}>
                                                        Sistem Informasi
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="text-input" class="form-label">Status Mahasiswa:</label>
                                            <select name="status" class="select2-icons form-select">
                                                <option value="Aktif" {{ old('status', $d['status']) == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                                <option value="Lulus" {{ old('status', $d['status']) == 'Lulus' ? 'selected' : '' }}>Lulus</option>
                                                <option value="Drop Out" {{ old('status', $d['status']) == 'Drop Out' ? 'selected' : '' }}>Drop Out</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Modal Delete --}}
                    <div class="modal fade" id="myModalDeleteMhs-{{$d['id']}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete Mahasiswa</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Form inside the modal -->
                                    <form method="POST" action="{{ route('delete.mahasiswa', $d['id']) }}">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="id" value="{{ $d['id'] }}">
                                        <div class="mb-3">
                                            <label for="text-input" class="form-label">Apakah anda yakin untuk menghapus data mahasiswa dengan npm tersebut?</label>
                                            <input class="form-control" value="{{ $d['npm'] }}" readonly>
                                        </div>
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Foto -->
                    <div class="modal fade" id="gambarModalFotoMahasiswa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Foto Mahasiswa</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <img src="" id="modalImageFotoMahasiswa" class="img-fluid" style="max-height: 100%; width: 100%;">
                                            </div>
                                            <div class="col-md-4">
                                                <ul class="list-group">
                                                    <li class="list-group-item active" aria-current="true">Data Mahasiswa</li>
                                                    <li class="list-group-item">Nama : {{ $d['npm'] }}</li>
                                                    <li class="list-group-item">NPM : {{ $d['npm'] }}</li>
                                                    <li class="list-group-item">Prodi : {{ $d['prodi'] }}</li>
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
    function showModalFotoMahasiswa(imageUrl) {
        document.getElementById('modalImageFotoMahasiswa').src = imageUrl;
    }

</script>

@endsection
