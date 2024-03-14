<!DOCTYPE html>

<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>@yield('pageTitle')</title>

    <meta name="description" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('/template/assets/img/favicon/favicon-1.png') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('/template/assets/vendor/fonts/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('/template/assets/vendor/fonts/tabler-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('/template/assets/vendor/fonts/flag-icons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('/template/assets/vendor/css/rtl/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('/template/assets/vendor/css/rtl/theme-default.css') }}" />
    <link rel="stylesheet" href="{{ asset('/template/assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('/template/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('/template/assets/vendor/libs/node-waves/node-waves.css') }}" />
    <link rel="stylesheet" href="{{ asset('/template/assets/vendor/libs/typeahead-js/typeahead.css') }}" />
    <link rel="stylesheet" href="{{ asset('/template/assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('/template/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('/template/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('/template/assets/vendor/libs/animate-css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('/template/assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />

    {{-- page CSS --}}
    <link rel="stylesheet" href="{{ asset('/template/assets/vendor/css/pages/page-profile.css') }}" />

    {{-- my CSS --}}
    <link rel="stylesheet" href="{{ asset('/template/assets/css/style.css') }}">

    <!-- Helpers -->
    <script src="{{ asset('/template/assets/vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('/template/assets/js/config.js') }}"></script>


</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            @yield('sidebar')

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                @yield('navbar')

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1">
                        {{-- <div class="row"> --}}
                        <!-- Main Content -->
                        @yield('mainContent')

                        <!-- Footer -->
                        @yield('footer')

                        <div class="content-backdrop fade"></div>
                        {{-- </div> --}}
                    </div>
                </div>

                <!-- Overlay -->
                <div class="layout-overlay layout-menu-toggle"></div>

                <!-- Drag Target Area To SlideIn Menu On Small Screens -->
                <div class="drag-target"></div>
            </div>

            <!-- Core JS -->
            <!-- build:js assets/vendor/js/core.js -->
            <script src="{{ asset('/template/assets/vendor/libs/jquery/jquery.js') }}"></script>
            <script src="{{ asset('/template/assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
            <script src="{{ asset('/template/assets/vendor/libs/popper/popper.js') }}"></script>
            <script src="{{ asset('/template/assets/vendor/js/bootstrap.js') }}"></script>
            <script src="{{ asset('/template/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
            <script src="{{ asset('/template/assets/vendor/libs/node-waves/node-waves.js') }}"></script>
            <script src="{{ asset('/template/assets/vendor/libs/hammer/hammer.js') }}"></script>
            <script src="{{ asset('/template/assets/vendor/libs/i18n/i18n.js') }}"></script>
            <script src="{{ asset('/template/assets/vendor/libs/typeahead-js/typeahead.js') }}"></script>
            <script src="{{ asset('/template/assets/vendor/libs/select2/select2.js') }}"></script>

            <script src="{{ asset('/template/assets/vendor/js/menu.js') }}"></script>
            <!-- endbuild -->

            <!-- Vendors JS -->
            <script src="{{ asset('/template/assets/vendor/libs/masonry/masonry.js') }}"></script>
            <script src="{{ asset('/template/assets/vendor/libs/datatables/jquery.dataTables.js') }}"></script>
            <script src="{{ asset('/template/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
            <script src="{{ asset('/template/assets/vendor/libs/datatables-responsive/datatables.responsive.js') }}">
            </script>
            <script src="{{ asset('/template/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js') }}">
            </script>
            <script src="{{ asset('/template/assets/vendor/libs/datatables-fixedColumns-bs5/fixedColumns.bootstrap5.js') }}">
            </script>

            <!-- Main JS -->
            <script src="{{ asset('/template/assets/js/main.js') }}"></script>

            <script src="{{ asset('/template/assets/js/script.js')}}"></script>

            {{-- notifikasi --}}
            <script>
                function cancelSuratTugas(id) {
                    // Panggil AJAX atau method lainnya untuk membatalkan persetujuan
                    $.ajax({
                        url: '/cancelsurattugas/' + id
                        , type: 'DELETE'
                        , headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                        , success: function() {
                            // Berhasil membatalkan persetujuan, lakukan tindakan yang diperlukan
                            updateApproveBadge(0);
                        }
                    })
                }

                function updateApproveBadge(count) {
                    // Ubah kode ini sesuai dengan struktur HTML dan badge Anda
                    $('#approve-badge').text(count);
                }

            </script>

            @if (session()->has('success'))
            <script>
                Swal.fire({
                    title: "Berhasil"
                    , icon: "success"
                    , text: "{{ session('success') }}"
                    , showConfirmButton: false
                    , timer: 2000
                }).then(() => {
                    setTimeout(function() {
                        window.location.href = '/';
                    }, 2000);
                });

            </script>
            @endif

            <!-- dataTable -->
            <script>
                $(document).ready(function() {
                    $('#riwayat-surat').DataTable({
                        paging: true
                        , searching: true
                        , fixedColumns: {
                            leftColumns: 3
                            , rightColumns: 0
                        }
                    });
                });

            </script>
</body>

</html>
