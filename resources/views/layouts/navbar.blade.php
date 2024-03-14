@extends('template');

@section('navbar')
<!-- Navbar -->

<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="ti ti-menu-2 ti-sm"></i>
        </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <ul class="navbar-nav flex-row align-items-center ms-auto">
            <!-- Notification -->
            <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-3 me-xl-1">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                    <i class="ti ti-bell ti-md"></i>
                    @php
                    $notificationCount = auth()->user()->unreadnotifications->count();
                    @endphp

                    @if($notificationCount > 0)
                    <span class="badge bg-danger rounded-pill badge-notifications">{{ $notificationCount }}</span>
                    @endif
                </a>
                @if($notificationCount > 0)
                <ul class="dropdown-menu dropdown-menu-end py-0">
                    <li class="dropdown-menu-header border-bottom">
                        <div class="dropdown-header d-flex align-items-center py-3">
                            <h5 class="text-body mb-0 me-auto">Notifikasi</h5>
                            <a href="javascript:void(0)" class="dropdown-notifications-all text-body" data-bs-toggle="tooltip" data-bs-placement="top" title="Mark all as read"><i class="ti ti-mail-opened fs-4"></i></a>
                        </div>
                    </li>
                    <li class="dropdown-notifications-list scrollable-container">
                        <ul class="list-group list-group-flush" style="max-height: 300px; overflow-y: auto;">
                            @foreach(auth()->user()->unreadnotifications as $notification)
                            <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="avatar">
                                            @if(isset($userAuth) && $userAuth && isset($userAuth->mahasiswa))
                                            <img src="{{ asset('storage/foto-mahasiswa/' . $userAuth->mahasiswa->foto) }}" alt class="h-auto rounded-circle" />
                                            @else
                                            <img src="{{ asset('/template/assets/img/avatars/user.png') }}" alt class="h-auto rounded-circle" />
                                            @endif
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <a href="
                                         @if($notification->data['jenis_surat'] === 'Surat Izin Penelitian')
                                         {{ route('riwayat-surat-izin-penelitian') }}
                                         @elseif($notification->data['jenis_surat'] === 'Surat Keterangan Aktif Kuliah')
                                         {{ route('riwayat-surat-keterangan-aktif') }}
                                         @elseif($notification->data['jenis_surat'] === 'Surat Keterangan Aktif Kuliah Ortu PNS')
                                         {{ route('riwayat-surat-keterangan-aktif-ortu-pns') }}
                                         @elseif($notification->data['jenis_surat'] === 'Surat Bebas Pustaka')
                                         {{ route('riwayat-surat-bebas-pustaka') }}
                                         @elseif($notification->data['jenis_surat'] === 'Surat Pengajuan Cuti')
                                         {{ route('riwayat-surat-pengajuan-cuti') }}
                                         @else
                                         {{ route('/home') }}
                                         @endif
                                        " class="text-decoration-none text-dark">
                                            <h6 class="mb-1">Pesan Baru ✉️</h6>
                                            <p class="mb-0">{{ $notification->data['jenis_surat'] }} telah disetujui oleh Admin</p>
                                            <small class="text-muted">{{ \Carbon\Carbon::parse($notification->created_at)->diffForHumans() }}</small>
                                        </a>
                                    </div>
                                    <div class="flex-shrink-0 dropdown-notifications-actions">
                                        <a href="{{ route('markasreadapprove', $notification->id) }}" class="dropdown-notifications-archive"><span class="ti ti-x"></span></a>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
                @endif
            </li>
            <!--/ Notification -->

            <!-- User -->
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                        @if(isset($userAuth) && $userAuth && isset($userAuth->mahasiswa))
                        <img src="{{ asset('storage/foto-mahasiswa/' . $userAuth->mahasiswa->foto) }}" alt class="h-auto rounded-circle" />
                        @else
                        <img src="{{ asset('/template/assets/img/avatars/user.png') }}" alt class="h-auto rounded-circle" />
                        @endif
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item" href="{{ route('user.profile', ['id'=> auth()->id()]) }}">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar avatar-online">
                                        @if(isset($userAuth) && $userAuth && isset($userAuth->mahasiswa))
                                        <img src="{{ asset('storage/foto-mahasiswa/' . $userAuth->mahasiswa->foto) }}" alt class="h-auto rounded-circle" />
                                        @else
                                        <img src="{{ asset('/template/assets/img/avatars/user.png') }}" alt class="h-auto rounded-circle" />
                                        @endif
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <span class="fw-semibold d-block">{{ auth()->user()->name }}</span>
                                    <small class="text-muted">Mahasiswa</small>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('user.profile', ['id' => auth()->id()]) }}">
                            <i class="ti ti-user-check me-2 ti-sm"></i>
                            <span class="align-middle">Profile</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('user.settingAccount', ['id' => auth()->id()]) }}">
                            <i class="ti ti-settings me-2 ti-sm"></i>
                            <span class="align-middle">Pengaturan</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{route('logout')}}">
                            <i class="ti ti-logout me-2 ti-sm"></i>
                            <span class="align-middle">Log Out</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!--/ User -->
        </ul>
    </div>

    <!-- Search Small Screens -->
    <div class="navbar-search-wrapper search-input-wrapper d-none">
        <input type="text" class="form-control search-input container-xxl border-0" placeholder="Search..." aria-label="Search..." />
        <i class="ti ti-x ti-sm search-toggler cursor-pointer"></i>
    </div>
</nav>

<!-- / Navbar -->
@endsection
