@extends('admin.template');

@section('pageTitle')
Home
@endsection

@section('mainContentAdmin')
<!-- Earning Reports Tabs-->
<div class="col-12 mb-4">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="card-title mb-0">
                <h5 class="mb-0">Earning Reports</h5>
                <small class="text-muted">Yearly Earnings Overview</small>
            </div>
            <div class="dropdown">
                <button class="btn p-0" type="button" id="earningReportsTabsId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="ti ti-dots-vertical ti-sm text-muted"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="earningReportsTabsId">
                    <a class="dropdown-item" href="javascript:void(0);">View More</a>
                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <ul class="nav nav-tabs widget-nav-tabs pb-3 gap-4 mx-1 d-flex flex-nowrap" role="tablist">
                <li class="nav-item">
                    <a href="/admin/listdata/suratizinpenelitian" class="nav-link btn active d-flex flex-column align-items-center justify-content-center" role="tab" data-bs-toggle="tab" data-bs-target="#navs-orders-id" aria-controls="navs-orders-id" aria-selected="true">
                        <div class="badge bg-label-secondary rounded p-2" style="font-size: 20px;">
                            {{ $totalSuratIzinPenelitian }}
                        </div>
                        <h6 class="tab-widget-title mb-0 mt-2">Izin Penelitian</h6>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="javascript:void(0);" class="nav-link btn d-flex flex-column align-items-center justify-content-center" role="tab" data-bs-toggle="tab" data-bs-target="#navs-sales-id" aria-controls="navs-sales-id" aria-selected="false">
                        <div class="badge bg-label-secondary rounded p-2" style="font-size: 20px;">
                            {{ $totalSuratKeteranganAktif }}
                        </div>
                        <h6 class="tab-widget-title mb-0 mt-2">Keterangan Aktif</h6>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="javascript:void(0);" class="nav-link btn d-flex flex-column align-items-center justify-content-center" role="tab" data-bs-toggle="tab" data-bs-target="#navs-income-id" aria-controls="navs-income-id" aria-selected="false" style="width: 150px; height: 150px;">
                        <div class="badge bg-label-secondary rounded p-2" style="font-size: 20px;">
                            {{ $totalSuratKeteranganAktifOrtuPns }}
                        </div>
                        <h6 class="tab-widget-title mb-0 mt-2">Keterangan Ortu PNS</h6>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="javascript:void(0);" class="nav-link btn d-flex flex-column align-items-center justify-content-center" role="tab" data-bs-toggle="tab" data-bs-target="#navs-income-id" aria-controls="navs-income-id" aria-selected="false">
                        <div class="badge bg-label-secondary rounded p-2" style="font-size: 20px;">
                            {{ $totalSuratBebasPustaka }}
                        </div>
                        <h6 class="tab-widget-title mb-0 mt-2">Bebas Pustaka</h6>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="javascript:void(0);" class="nav-link btn d-flex flex-column align-items-center justify-content-center" role="tab" data-bs-toggle="tab" data-bs-target="#navs-income-id" aria-controls="navs-income-id" aria-selected="false">
                        <div class="badge bg-label-secondary rounded p-2" style="font-size: 20px;">
                            {{ $totalSuratPengajuanCuti }}
                        </div>
                        <h6 class="tab-widget-title mb-0 mt-2">Pengajuan Cuti</h6>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="javascript:void(0);" class="nav-link btn d-flex flex-column align-items-center justify-content-center" role="tab" data-bs-toggle="tab" data-bs-target="#navs-income-id" aria-controls="navs-income-id" aria-selected="false">
                        <div class="badge bg-label-secondary rounded p-2" style="font-size: 20px;">
                            {{ $totalMahasiswa }}

                        </div>
                        <h6 class="tab-widget-title mb-0 mt-2">Mahasiswa</h6>
                    </a>
                </li>
            </ul>
            <div class="tab-content p-0 ms-0 ms-sm-2">
                <div class="tab-pane fade show active" id="navs-orders-id" role="tabpanel">
                    <div id="earningReportsTabsOrders"></div>
                </div>
                <div class="tab-pane fade" id="navs-sales-id" role="tabpanel">
                    <div id="earningReportsTabsSales"></div>
                </div>
                <div class="tab-pane fade" id="navs-profit-id" role="tabpanel">
                    <div id="earningReportsTabsProfit"></div>
                </div>
                <div class="tab-pane fade" id="navs-income-id" role="tabpanel">
                    <div id="earningReportsTabsIncome"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-6 mb-4">
    <div class="card h-100">
        <div class="card-header d-flex justify-content-between">
            <div class="card-title mb-0">
                <h5 class="mb-0">Active Project</h5>
                <small class="text-muted">Average 72% Completed</small>
            </div>
            <div class="dropdown">
                <button class="btn p-0" type="button" id="activeProjects" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="ti ti-dots-vertical ti-sm text-muted"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="activeProjects">
                    <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                    <a class="dropdown-item" href="javascript:void(0);">Download</a>
                    <a class="dropdown-item" href="javascript:void(0);">View All</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <ul class="p-0 m-0">
                <li class="mb-3 pb-1 d-flex">
                    <div class="d-flex w-50 align-items-center me-3">
                        <img src="{{ asset('/template/assets/img/icons/brands/laravel-logo.png') }}" alt="laravel-logo" class="me-3" width="35" />
                        <div>
                            <h6 class="mb-0">Surat</h6>
                            <small class="text-muted">Izin Penelitian</small>
                        </div>
                    </div>
                    <div class="d-flex flex-grow-1 align-items-center">
                        <div class="progress w-100 me-3" style="height: 8px">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: {{ $totalSuratIzinPenelitian }}%" aria-valuenow="{{ $totalSuratIzinPenelitian }}" aria-valuemin="0" aria-valuemax="100"></div>

                        </div>
                        <span class="text-muted">{{ $totalSuratIzinPenelitian }}%</span>

                    </div>
                </li>
                <li class="mb-3 pb-1 d-flex">
                    <div class="d-flex w-50 align-items-center me-3">
                        <img src="{{ asset('/template/assets/img/icons/brands/figma-logo.png') }}" alt="figma-logo" class="me-3" width="35" />

                        <div>
                            <h6 class="mb-0">Surat Keterangan</h6>
                            <small class="text-muted">Aktif Kuliah</small>
                        </div>
                    </div>
                    <div class="d-flex flex-grow-1 align-items-center">
                        <div class="progress w-100 me-3" style="height: 8px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: {{ $totalSuratKeteranganAktif }}%" aria-valuenow="{{ $totalSuratKeteranganAktif }}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span class="text-muted">{{ $totalSuratKeteranganAktif }}%</span>
                    </div>
                </li>
                <li class="mb-3 pb-1 d-flex">
                    <div class="d-flex w-50 align-items-center me-3">
                        <img src="{{ asset('/template/assets/img/icons/brands/vue-logo.png') }}" alt="vue-logo" class="me-3" width="35" />
                        <div>
                            <h6 class="mb-0">Surat Keterangan</h6>
                            <small class="text-muted">Aktif Kuliah (Ortu PNS)</small>
                        </div>
                    </div>
                    <div class="d-flex flex-grow-1 align-items-center">
                        <div class="progress w-100 me-3" style="height: 8px">
                            <div class="progress-bar bg-success" role="progressbar" style="width: {{ $totalSuratKeteranganAktifOrtuPns }}%" aria-valuenow="{{ $totalSuratKeteranganAktifOrtuPns }}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span class="text-muted">{{ $totalSuratKeteranganAktifOrtuPns }}%</span>
                    </div>
                </li>
                <li class="mb-3 pb-1 d-flex">
                    <div class="d-flex w-50 align-items-center me-3">
                        <img src="{{ asset('/template/assets/img/icons/brands/react-logo.png') }}" alt="react-logo" class="me-3" width="35" />
                        <div>
                            <h6 class="mb-0">Surat</h6>
                            <small class="text-muted">Bebas Pustaka</small>
                        </div>
                    </div>
                    <div class="d-flex flex-grow-1 align-items-center">
                        <div class="progress w-100 me-3" style="height: 8px">
                            <div class="progress-bar bg-info" role="progressbar" style="width: {{ $totalSuratBebasPustaka }}%" aria-valuenow="{{ $totalSuratBebasPustaka }}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span class="text-muted">{{ $totalSuratBebasPustaka }}%</span>
                    </div>
                </li>
                <li class="mb-3 pb-1 d-flex">
                    <div class="d-flex w-50 align-items-center me-3">
                        <img src="{{ asset('/template/assets/img/icons/brands/bootstrap-logo.png') }}" alt="bootstrap-logo" class="me-3" width="35" />
                        <div>
                            <h6 class="mb-0">Surat</h6>
                            <small class="text-muted">Pengajuan Cuti</small>
                        </div>
                    </div>
                    <div class="d-flex flex-grow-1 align-items-center">
                        <div class="progress w-100 me-3" style="height: 8px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: {{ $totalSuratPengajuanCuti }}%" aria-valuenow="{{ $totalSuratPengajuanCuti }}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span class="text-muted">{{ $totalSuratPengajuanCuti }}%</span>
                    </div>
                </li>
                <li class="d-flex">
                    <div class="d-flex w-50 align-items-center me-3">
                        <img src="{{ asset('/template/assets/img/icons/brands/sketch-logo.png') }}" alt="sketch-logo" class="me-3" width="35" />
                        <div>
                            <h6 class="mb-0">Total Surat</h6>
                            <small class="text-muted">Informatika & Sistem Informasi</small>
                        </div>
                    </div>
                    <div class="d-flex flex-grow-1 align-items-center">
                        <div class="progress w-100 me-3" style="height: 8px">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: {{ $countAllSurat }}" aria-valuenow="{{ $countAllSurat }}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span class="text-muted">{{ $countAllSurat }}%</span>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>

<!-- Donut Chart -->
<div class="col-md-6 col-12 mb-4">
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <div>
                <h5 class="card-title mb-0">Expense Ratio</h5>
                <small class="text-muted">Spending on various categories</small>
            </div>
            <div class="dropdown d-none d-sm-flex">
                <button type="button" class="btn dropdown-toggle px-0" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="ti ti-calendar"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Today</a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Yesterday</a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Last 7 Days</a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Last 30 Days</a>
                    </li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Current
                            Month</a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Last Month</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="card-body">
            <div id="donutChart"></div>
        </div>
    </div>
</div>

@endsection
