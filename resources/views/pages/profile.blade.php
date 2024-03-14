@extends('template');

@section('pageTitle')
User Profile
@endsection

@section('mainContent')

<h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">User Profile /</span> Profile
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
                    <img src="{{ asset('storage/foto-mahasiswa/' . $user->mahasiswa->foto) }}" alt="user image" class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img" />
                </div>
                <div class="flex-grow-1 mt-3 mt-sm-5">
                    <div class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
                        <div class="user-profile-info">
                            <h4>{{ auth()->user()->name }}</h4>
                            <ul class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
                                <li class="list-inline-item">
                                    <i class="ti ti-color-swatch"></i> Mahasiswa
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
                @if($errors->any())
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

<!-- User Profile Content -->
<div class="row">
    <div class="col-xl-4 col-lg-5 col-md-5">
        <!-- About User -->
        <div class="card mb-4">
            <div class="card-body">
                <small class="card-text text-uppercase">About</small>
                <ul class="list-unstyled mb-4 mt-3">
                    <li class="d-flex align-items-center mb-3">
                        <i class="ti ti-user"></i><span class="fw-bold mx-2">Nama Lengkap:</span>
                        <span>{{ $user->name }}</span>
                    </li>
                    <li class="d-flex align-items-center mb-3">
                        <i class="ti ti-number"></i><span class="fw-bold mx-2">NPM:</span>
                        <span>{{ $user->npm }}</span>
                    </li>
                    <li class="d-flex align-items-center mb-3">
                        <i class="ti ti-pencil"></i><span class="fw-bold mx-2">Semester:</span>
                        <span>{{ $user->mahasiswa->semester ?? '' }}</span>
                    </li>
                    <li class="d-flex align-items-center mb-3">
                        <i class="ti ti-notebook"></i><span class="fw-bold mx-2">Prodi:</span>
                        <span>{{ $user->mahasiswa->prodi ?? '' }}</span>
                    </li>
                    <li class="d-flex align-items-center mb-3">
                        <i class="ti ti-flag"></i><span class="fw-bold mx-2">Domisili:</span>
                        <span>{{ $user->mahasiswa->domisili ?? '' }}</span>
                    </li>
                    <li class="d-flex align-items-center mb-3">
                        <i class="ti ti-flag"></i><span class="fw-bold mx-2">Jenis Kelamin:</span>
                        <span>{{ $user->mahasiswa->jenis_kelamin ?? '' }}</span>
                    </li>
                    <li class="d-flex align-items-center mb-3">
                        <i class="ti ti-crown"></i><span class="fw-bold mx-2">Role:</span>
                        <span>Mahasiswa</span>
                    </li>
                    <li class="d-flex align-items-center mb-3">
                        <i class="ti ti-help"></i><span class="fw-bold mx-2">Status:</span>
                        <span>{{ $user->mahasiswa->status ?? '' }}</span>
                    </li>
                </ul>
                <small class="card-text text-uppercase">Contacts</small>
                <ul class="list-unstyled mb-4 mt-3">
                    <li class="d-flex align-items-center mb-3">
                        <i class="ti ti-phone-call"></i><span class="fw-bold mx-2">Contact:</span>
                        <span>{{ $user->mahasiswa->no_hp ?? '' }}</span>
                    </li>
                </ul>
            </div>
        </div>
        <!--/ About User -->
    </div>
    <div class="col-xl-8 col-lg-7 col-md-7">
        <!-- Activity Timeline -->
        <div class="card card-action mb-4">
            <div class="card-header align-items-center">
                <h5 class="card-action-title mb-0">Aktivitas Terbaru</h5>
                <div class="card-action-element">
                    <div class="dropdown">
                        <button type="button" class="btn dropdown-toggle hide-arrow p-0" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="ti ti-dots-vertical text-muted"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" href="javascript:void(0);">Share timeline</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="javascript:void(0);">Suggest edits</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li>
                                <a class="dropdown-item" href="javascript:void(0);">Report bug</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-body pb-0">
                <ul class="timeline ms-1 mb-0">
                    <li class="timeline-item timeline-item-transparent">
                        <span class="timeline-point timeline-point-primary"></span>
                        <div class="timeline-event">
                            <div class="timeline-header">
                                <h6 class="mb-0">Client Meeting</h6>
                                <small class="text-muted">Today</small>
                            </div>
                            <p class="mb-2">
                                Project meeting with john @10:15am
                            </p>
                            <div class="d-flex flex-wrap">
                                <div class="avatar me-2">
                                    <img src="{{ asset('/template/assets/img/avatars/3.png') }}" alt="Avatar" class="rounded-circle" />
                                </div>
                                <div class="ms-1">
                                    <h6 class="mb-0">Lester McCarthy (Client)</h6>
                                    <span>CEO of Infibeam</span>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="timeline-item timeline-item-transparent">
                        <span class="timeline-point timeline-point-success"></span>
                        <div class="timeline-event">
                            <div class="timeline-header">
                                <h6 class="mb-0">
                                    Create a new project for client
                                </h6>
                                <small class="text-muted">2 Day Ago</small>
                            </div>
                            <p class="mb-0">Add files to new design folder</p>
                        </div>
                    </li>
                    <li class="timeline-item timeline-item-transparent">
                        <span class="timeline-point timeline-point-danger"></span>
                        <div class="timeline-event">
                            <div class="timeline-header">
                                <h6 class="mb-0">Shared 2 New Project Files</h6>
                                <small class="text-muted">6 Day Ago</small>
                            </div>
                            <p class="mb-2">
                                Sent by Mollie Dixon
                                <img src="{{ asset('/template/assets/img/avatars/4.png') }}" class="rounded-circle me-3" alt="avatar" height="24" width="24" />
                            </p>
                            <div class="d-flex flex-wrap gap-2 pt-1">
                                <a href="javascript:void(0)" class="me-3">
                                    <img src="{{ asset('/template/assets/img/icons/misc/doc.png') }}" alt="Document image" width="15" class="me-2" />
                                    <span class="fw-semibold text-heading">App Guidelines</span>
                                </a>
                                <a href="javascript:void(0)">
                                    <img src="{{ asset('/template/assets/img/icons/misc/xls.png') }}" alt="Excel image" width="15" class="me-2" />
                                    <span class="fw-semibold text-heading">Testing Results</span>
                                </a>
                            </div>
                        </div>
                    </li>
                    <li class="timeline-item timeline-item-transparent border-0">
                        <span class="timeline-point timeline-point-info"></span>
                        <div class="timeline-event">
                            <div class="timeline-header">
                                <h6 class="mb-0">Project status updated</h6>
                                <small class="text-muted">10 Day Ago</small>
                            </div>
                            <p class="mb-0">Woocommerce iOS App Completed</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
</div>
<!--/ User Profile Content -->

@endsection
