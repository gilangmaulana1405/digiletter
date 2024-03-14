<!DOCTYPE html>

<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>@yield('pageTitle')</title>
    <meta name="description" content="" />


    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('/template/assets/img/favicon/favicon.ico') }}" />

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
    <link rel="stylesheet" href="{{ asset('/template/assets/vendor/libs/dropzone/dropzone.css') }}" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts/dist/apexcharts.css">

    <!-- Helpers -->
    <script src="{{ asset('/template/assets/vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('/template/assets/js/config.js') }}"></script>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            @yield('sidebarAdmin')

            <!-- Layout container -->
            <div class="layout-page">

                <!-- Navbar -->
                @yield('navbarAdmin')

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1">
                        <div class="row">
                            <!-- Main Content -->
                            @yield('mainContentAdmin')

                            <!-- Footer -->
                            @yield('footerAdmin')

                            <div class="content-backdrop fade"></div>
                        </div>
                        <!-- Content wrapper -->
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
            <script src="{{ asset('/template/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}">
            </script>
            <script src="{{ asset('/template/assets/vendor/libs/datatables-fixedcolumns-bs5/fixedcolumns.bootstrap5.css') }}">
            </script>
            <script src="{{ asset('/template/assets/vendor/libs/dropzone/dropzone.js') }}">
            </script>

            <!-- Main JS -->
            <script src="{{ asset('/template/assets/js/main.js') }}"></script>
            <script src="{{ asset('/template/assets/js/script.js') }}"></script>

            <!-- Page JS -->
            <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

            {{-- preview pdf --}}
            <script>
                function openPdfPreview(pdfUrl) {
                    // Setel atribut 'src' iframe dengan URL PDF
                    document.getElementById('pdfPreviewFrame').src = pdfUrl;

                    // Tampilkan modal
                    $('#pdfPreviewModal').modal('show');
                }

            </script>

            {{-- chartapex --}}
            <script>
                const chartColors = {
                    column: {
                        series1: '#826af9'
                        , series2: '#d2b0ff'
                        , bg: '#f8d3ff'
                    }
                    , donut: {
                        series1: '#fee802'
                        , series2: '#3fd0bd'
                        , series3: '#826bf8'
                        , series4: '#2b9bf4'
                    }
                    , area: {
                        series1: '#29dac7'
                        , series2: '#60f2ca'
                        , series3: '#a5f8cd'
                    }
                };

                document.addEventListener('DOMContentLoaded', function() {
                    let cardColor, headingColor, labelColor, borderColor, legendColor;

                    if (isDarkStyle) {
                        cardColor = config.colors_dark.cardColor;
                        headingColor = config.colors_dark.headingColor;
                        labelColor = config.colors_dark.textMuted;
                        legendColor = config.colors_dark.bodyColor;
                        borderColor = config.colors_dark.borderColor;
                    } else {
                        cardColor = config.colors.cardColor;
                        headingColor = config.colors.headingColor;
                        labelColor = config.colors.textMuted;
                        legendColor = config.colors.bodyColor;
                        borderColor = config.colors.borderColor;
                    }

                    const donutChartEl = document.querySelector('#donutChart');
                    const donutChartConfig = {
                        chart: {
                            height: 390
                            , type: 'donut'
                        }
                        , labels: ['Operational', 'Networking', 'Hiring', 'R&D']
                        , series: [42, 7, 25, 25]
                        , colors: [
                            chartColors.donut.series2
                            , chartColors.donut.series4
                            , chartColors.donut.series3
                            , chartColors.donut.series1
                        ]
                        , stroke: {
                            show: false
                            , curve: 'straight'
                        }
                        , dataLabels: {
                            enabled: true
                            , formatter: function(val, opt) {
                                return parseInt(val, 10) + '%';
                            }
                        }
                        , legend: {
                            show: true
                            , position: 'bottom'
                            , markers: {
                                offsetX: -3
                            }
                            , itemMargin: {
                                vertical: 3
                                , horizontal: 10
                            }
                            , labels: {
                                colors: legendColor
                                , useSeriesColors: false
                            }
                        }
                        , plotOptions: {
                            pie: {
                                donut: {
                                    labels: {
                                        show: true
                                        , name: {
                                            fontSize: '2rem'
                                            , fontFamily: 'Open Sans'
                                        }
                                        , value: {
                                            fontSize: '1.2rem'
                                            , color: legendColor
                                            , fontFamily: 'Open Sans'
                                            , formatter: function(val) {
                                                return parseInt(val, 10) + '%';
                                            }
                                        }
                                        , total: {
                                            show: true
                                            , fontSize: '1.5rem'
                                            , color: headingColor
                                            , label: 'Operational'
                                            , formatter: function(w) {
                                                return '42%';
                                            }
                                        }
                                    }
                                }
                            }
                        }
                        , responsive: [{
                                breakpoint: 992
                                , options: {
                                    chart: {
                                        height: 380
                                    }
                                    , legend: {
                                        position: 'bottom'
                                        , labels: {
                                            colors: legendColor
                                            , useSeriesColors: false
                                        }
                                    }
                                }
                            }
                            , {
                                breakpoint: 576
                                , options: {
                                    chart: {
                                        height: 320
                                    }
                                    , plotOptions: {
                                        pie: {
                                            donut: {
                                                labels: {
                                                    show: true
                                                    , name: {
                                                        fontSize: '1.5rem'
                                                    }
                                                    , value: {
                                                        fontSize: '1rem'
                                                    }
                                                    , total: {
                                                        fontSize: '1.5rem'
                                                    }
                                                }
                                            }
                                        }
                                    }
                                    , legend: {
                                        position: 'bottom'
                                        , labels: {
                                            colors: legendColor
                                            , useSeriesColors: false
                                        }
                                    }
                                }
                            }
                            , {
                                breakpoint: 420
                                , options: {
                                    chart: {
                                        height: 280
                                    }
                                    , legend: {
                                        show: false
                                    }
                                }
                            }
                            , {
                                breakpoint: 360
                                , options: {
                                    chart: {
                                        height: 250
                                    }
                                    , legend: {
                                        show: false
                                    }
                                }
                            }
                        ]
                    };
                    if (donutChartEl !== null) {
                        const donutChart = new ApexCharts(donutChartEl, donutChartConfig);
                        donutChart.render();
                    }
                });

            </script>

            <!-- dataTable -->
            <script>
                $(document).ready(function() {
                    $('#listdata').DataTable({});
                });

            </script>

            {{-- sweetalert --}}
            @if (session()->has('success'))
            <script>
                Swal.fire({
                    icon: "success"
                    , text: "{{ session('success') }}"
                    , showConfirmButton: false
                    , timer: 2000
                });

            </script>
            @endif

</body>

</html>
