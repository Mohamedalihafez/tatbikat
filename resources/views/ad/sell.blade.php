<!DOCTYPE html>
<html lang="{{ LaravelLocalization::getCurrentLocale() }}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

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

    @vite('resources/css/app.css')

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

    <section class="post_offer">
      <div class="l-container">
        <div class="post_offer_header">
          <h1>{{ __("post.POST YOUR AD") }}</h1>
        </div>

        <div class="post_offer_content">
          <div class="post_offer_content-header">
            <h2>{{ __("post.CHOOSE A CATEGORY") }}</h2>
          </div>

          <div class="row">
            <div class="categories">
                @foreach ($mainCategories as $mainCategory)
                <div class="category" data-target="{{  $mainCategory->slug }}">
                  <div class="category_icon w-[2rem] h-[2rem]">
                    <img src="{{ asset("upload_files/main_categories/" . $mainCategory->thumbnail ) }}" alt="">
                  </div>
                  <span class="category_body">{{ $mainCategory->translate()->name }}</span>
                  <span class="category_icon-arrow"
                    ><i class="bx bx-chevron-{{ App::getLocale() === "en" ? "right" : "left" }}"></i
                  ></span>
                </div>
              @endforeach
            </div>

            <div class="sub_categories-content">
              @foreach ($mainCategories as $mainCategory)
                <div class="sub_categories  {{ $mainCategory->slug }}">
                  @if($mainCategory->subCategories)
                  @foreach ($mainCategory->subCategories as $subCategory)
                    <div class="sub_category">
                      <a href="{{ route("ad.post", [$mainCategory->slug, $subCategory->slug]) }}">{{ $subCategory->translate()->name }}</a>
                    </div>
                  @endforeach
                  @endif
                </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </section>

    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
      integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>

    <script>
      const categories = document.querySelectorAll(".categories .category");
      const sub_categories = document.querySelectorAll(
          ".sub_categories-content .sub_categories"
      );
      categories.forEach((category) => {
          category.onclick = (ele) => {
              categories.forEach((category) => {
                  category.classList.remove("active");
              });

              sub_categories.forEach((sub_category) => {
                  sub_category.classList.remove("active");
              });

              ele.currentTarget.classList.add("active");
             let x = ele.currentTarget.dataset.target;
            let yz= document.getElementsByClassName([x]);
            yz[0].classList.add("active");
          };
      });
    </script>
  </body>
</html>
