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

    <link rel="stylesheet" href="{{ asset('/template/assets/vendor/libs/flatpickr/flatpickr.css') }}" />
    <link rel="stylesheet" href="{{ asset('/template/assets/vendor/libs/select2/select2.css') }}" />

    <!-- Vendor Form Validation CSS -->
    <link rel="stylesheet" href="{{ asset('/template/assets/vendor/libs/formvalidation/dist/css/formValidation.min.css') }}" />

    <!-- Page CSS -->
    <link rel="stylesheet" href="{{ asset('/template/assets/vendor/css/pages/page-auth.css') }}" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ asset('/template/assets/vendor/js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('/template/assets/js/config.js') }}"></script>
</head>

<body>

    @yield('authPage')

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('/template/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('/template/assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('/template/assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('/template/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('/template/assets/vendor/libs/node-waves/node-waves.js') }}"></script>

    <script src="{{ asset('/template/assets/vendor/libs/hammer/hammer.js') }}"></script>
    <script src="{{ asset('/template/assets/vendor/libs/i18n/i18n.js') }}"></script>
    <script src="{{ asset('/template/assets/vendor/libs/typeahead-js/typeahead.js') }}"></script>
    <script src="{{ asset('/template/assets/vendor/libs/cleavejs/cleave.js') }}"></script>
    <script src="{{ asset('/template/assets/vendor/libs/cleavejs/cleave-phone.js') }}"></script>
    <script src="{{ asset('/template/assets/vendor/libs/moment/moment.js') }}"></script>
    <script src="{{ asset('/template/assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
    <script src="{{ asset('/template/assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('/template/assets/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('/template/assets/vendor/libs/masonry/masonry.js') }}"></script>
    <script src="{{ asset('/template/assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js') }}"></script>
    <script src="{{ asset('/template/assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js') }}"></script>
    <script src="{{ asset('/template/assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('/template/assets/js/main.js') }}"></script>
    <!-- Page JS -->
    <script src="{{ asset('/template/assets/js/pages-auth.js') }}"></script>
    <script src="{{ asset('/template/assets/js/form-layouts.js') }}"></script>

    <script src="{{ asset('/template/assets/js/script.js')}}">
    </script>

</body>

</html>
