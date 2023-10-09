<!DOCTYPE html>
<html lang="{{ LaravelLocalization::getCurrentLocale() }}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>{{ config("app.name") }}</title>

    <meta name="description" content="" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset("backEnd/assets/vendor/fonts/boxicons.css") }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset("backEnd/assets/vendor/css/core.css") }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset("backEnd/assets/vendor/css/theme-default.css") }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset("backEnd/assets/css/demo.css") }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset("backEnd/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css") }}" />
    <link rel="stylesheet" href="{{ asset("backEnd/assets/vendor/libs/apex-charts/apex-charts.css") }}" />

    <!-- Helpers -->
    <script src="{{ asset("backEnd/assets/vendor/js/helpers.js") }}"></script>
    <script src="{{ asset("backEnd/assets/js/config.js") }}"></script>

    @if (App::getLocale() === "ar")
    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="{{ asset("frontEnd/assets/css/customadmin.css") }}">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900;1000&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset("backEnd/assets/css/style.css") }}">
    @else
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="{{ asset("backEnd/assets/css/style.css") }}">
    @endif
    {{-- CSS --}}

    {{-- Files DataTables Styles --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->
        @include('components.layouts.back-end.inc/side-bar')
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->
            @include('components.layouts.back-end.inc/navigation')
          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            {{ $slot }}
            <!-- / Content -->

            <!-- Footer -->
            @include('components.layouts.back-end.inc.footer')
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset("backEnd/assets/vendor/libs/jquery/jquery.js") }}"></script>
    <script src="{{ asset("backEnd/assets/vendor/libs/popper/popper.js") }}"></script>
    <script src="{{ asset("backEnd/assets/vendor/js/bootstrap.js") }}"></script>
    <script src="{{ asset("backEnd/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js") }}"></script>
    <script src="{{ asset("backEnd/assets/vendor/js/menu.js") }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset("backEnd/assets/vendor/libs/apex-charts/apexcharts.js") }}"></script>

    <!-- Main JS -->
    <script src="{{ asset("backEnd/assets/js/main.js") }}"></script>

    <!-- Page JS -->
    {{-- <script src="{{ asset("backEnd/assets/js/dashboards-analytics.js") }}"></script> --}}

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="{{ asset('backEnd/assets/js/sweetalert2.js') }}"></script>
    <script src="{{ asset('backEnd/assets/js/ajaxActions.js') }}"></script>

    {{-- Files DataTables Scripts --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

    {{-- Scripts --}}
    @stack('scripts')
  </body>
</html>
