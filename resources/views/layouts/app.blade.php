

<!DOCTYPE html>
<html lang="{{ LaravelLocalization::getCurrentLocale() }}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css"
      integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
      <link rel="stylesheet" href="{{ asset("frontEnd/assets/css/custom.css") }}" />

    @if(App::getLocale() === "ar")
      <!-- STYLING -->
      <link rel="stylesheet" href="{{ asset("frontEnd/assets/css/ar/main.css") }}" />

      {{-- Fonts --}}
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900;1000&display=swap" rel="stylesheet">
    @else
      <!-- STYLING -->
      <link rel="stylesheet" href="{{ asset("frontEnd/assets/css/en/main.css") }}" />

      <!-- FONTS OF SITE -->
      <link rel="preconnect" href="https://fonts.googleapis.com" />
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
      <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet"
      />
    @endif

    {{-- JQuery --}}
    <script  
      src="https://code.jquery.com/jquery-3.6.1.min.js" 
      integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" 
      crossorigin="anonymous"
    ></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles

    <title>{{ config("app.name") }}</title>
  </head>
  <body>
    {{-- Header --}}
    @include('components.layouts.front-end.inc.header')

    {{-- Content --}}

    {{ $slot }}

    {{-- /Content --}}

    {{-- Footer --}}
    @include('components.layouts.front-end.inc.footer')

    {{-- Scripts Ajax tags --}}
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
      integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"
      integrity="sha512-gY25nC63ddE0LcLPhxUJGFxa2GoIyA5FLym4UJqHDEMHjp8RET6Zn/SHo1sltt3WuVtqfyxECP38/daUc/WVEA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>

    {{-- Pusher Scripts --}}
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <script>
      // Enable pusher logging - don't include this in production
      Pusher.logToConsole = true;

      var pusher = new Pusher('d84ff42ef35fb81e8722', {
        cluster: 'eu'
      });
    </script>

    {{-- Main Script --}}
    <script src="{{ asset("frontEnd/assets/js/index.js") }}"></script>

    @stack('scripts')
    @stack('modals')

    @livewireScripts
  </body>
</html>

