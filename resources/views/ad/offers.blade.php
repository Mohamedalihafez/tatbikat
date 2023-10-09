

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

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.min.js"></script>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>{{ config("app.name") . " " . "-" . " " . $title }}</title>
  </head>
  <body>
    <header class="Ad_header">
      <div class="l-container">
        <div class="back_to_home">
          <a href="{{ route("index") }}">{{ __("messages.back to home") }}</a>
        </div>
      </div>
    </header>

    <main class="mx-[3rem]">
      <div class="p-[1.5rem] rounded-[1rem] border-[0.1rem] border-slate-400">
        <h1 class="text-[1rem] font-[600] mb-[2rem] capitalize">{{ __("offer.what to do next") }}</h1>

        @if (session('status'))
          <div class="mb-4 mt-4 font-medium text-sm text-green-600">
              {{ session('status') }}
          </div>
        @endif

        <form action="{{ route("ad.post.offers.update", $ad->slug) }}" method="post">
          @csrf
          @method("PATCH")

          @if ($offers->count())
            @foreach ($offers as $offer)
              <div class="w-[35rem] p-[0.5rem] rounded-[0.5rem] border-[0.1rem] border-slate-400 mb-[1rem]">
                <div class="flex items-center">
                  <div class="{{ App::getLocale() == "en" ? "mr-[0.5rem]" : "ml-[0.5rem]" }}">
                    <input type="radio" {{ $ad->offer_id === $offer->id ? "checked" : "" }} class="{{ App::getLocale() == "en" ? "mr-[0.5rem]" : "ml-[0.5rem]" }}" name="offer_id" value="{{ $offer->id }}" />
                  </div>
                  <div class="flex-1">
                    <h1 class="text-[1rem] font-[700] mb-[0.3rem] capitalize">{{ $offer->name }}</h1>
                    <p class="text-[0.8rem] font-[300]">{{ $offer->description }}</p>
                  </div>
                  <div>
                    <h2 class="text-[1rem] font-[700] uppercase">{{ $offer->price . " " . __("my_ads.egp") }}</h2>
                  </div>
                </div>
              </div>
            @endforeach
            <div class="error_message">
              @error('offer_id')
              <p>{{ $message }}</p>
              @enderror
            </div>

            <div class="mt-[3.5rem] flex items-center">
              <button class=" bg-amber-600 text-[#f1f1f1] text-[0.9rem] font-[700] px-[1rem] rounded-[0.3rem] py-[0.7rem] capitalize {{ App::getLocale() == "en" ? "mr-[3rem]" : "ml-[3rem]" }}" type="submit">{{ __("offer.promote your ad") }}</button>
              <a href="{{ route("users.my-ads") }}" class="text-[0.9rem] font-[500] underline hover:no-underline">{{ __("offer.skip, show your ad") }}</a>
            </div>
          @else
            <div class="">
              <p>{{ __("offer.no offers yet") }}</p>
            </div>
          @endif
        </form>
      </div>
    </main>
  </body>
</html>
