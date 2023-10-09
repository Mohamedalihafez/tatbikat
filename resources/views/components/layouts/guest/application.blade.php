<!DOCTYPE html>
<html lang="{{ LaravelLocalization::getCurrentLocale() }}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    />

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

    @vite('resources/css/app.css')

    <title>On Fire | Login</title>
  </head>
  <body>

    {{-- Header --}}
    @include('components.layouts.guest.inc.header')

    {{-- Content --}}
    {{ $slot }}
    {{-- /Content --}}

  </body>
</html>
