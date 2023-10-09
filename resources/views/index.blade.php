


<x-layouts.front-end.application>

    <section class="home">
      <div class="l-container">
        <div class="owl-carousel owl-theme home-content">
          <div class="item">
            <div class="item-container">
              <div class="box-img">
                <img src="{{ asset("frontEnd/assets/image/home/001.jpg") }}" alt="" />
              </div>

              <div class="item-details">
                <h1>{{ __("messages.Lorem ipsum dolor") }}</h1>
                <p>
                  {{ __("messages.Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore nulla quisquam modi nemo obcaecati in") }}
                </p>
              </div>
            </div>
          </div>

          <div class="item">
            <div class="item-container">
              <div class="box-img">
                <img src="{{ asset("frontEnd/assets/image/home/002.jpg") }}" alt="" />
              </div>

              <div class="item-details">
                <h1>{{ __("messages.Lorem ipsum dolor") }}</h1>
                <p>
                  {{ __("messages.Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore nulla quisquam modi nemo obcaecati in") }}
                </p>
              </div>
            </div>
          </div>

          <div class="item">
            <div class="item-container">
              <div class="box-img">
                <img src="{{ asset("frontEnd/assets/image/home/003.jpg") }}" alt="" />
              </div>

              <div class="item-details">
                <h1>{{ __("messages.Lorem ipsum dolor") }}</h1>
                <p>
                  {{ __("messages.Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore nulla quisquam modi nemo obcaecati in") }}
                </p>
              </div>
            </div>
          </div>

          <div class="item">
            <div class="item-container">
              <div class="box-img">
                <img src="{{ asset("frontEnd/assets/image/home/004.jpg") }}" alt="" />
              </div>

              <div class="item-details">
                <h1>{{ __("messages.Lorem ipsum dolor") }}</h1>
                <p>
                  {{ __("messages.Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore nulla quisquam modi nemo obcaecati in") }}
                </p>
              </div>
            </div>
          </div>

          <div class="item">
            <div class="item-container">
              <div class="box-img">
                <img src="{{ asset("frontEnd/assets/image/home/005.jpg") }}" alt="" />
              </div>

              <div class="item-details">
                <h1>{{ __("messages.Lorem ipsum dolor") }}</h1>
                <p>
                  {{ __("messages.Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore nulla quisquam modi nemo obcaecati in") }}
                </p>
              </div>
            </div>
          </div>
        </div>

        <div class="categories" id="categories">
          <div class="l-container">

            <div class="link" data-val="{{ App::getLocale() == "en" ? "special offer" : "عرض مميز" }}">
              <a href="">
                <span>{{ __("messages.Featured ads") }}</span>
                <span><i class='bx bx-spreadsheet'></i></span>
              </a>
            </div>

            <div class="link" data-val="trusted">
              <a href="">
                <span>{{ __("messages.Certified ads") }}</span>
                <span><i class='bx bx-spreadsheet'></i></span>
              </a>
            </div>

            <div class="link" data-val="last_24_hours">
              <a href="">
                <span>{{ __("messages.Ads last 24 hours") }}</span>
                <span><i class='bx bx-spreadsheet'></i></span>
              </a>
            </div>

          </div>
        </div>

        <div class="recommendations">
          <h2>{{ __("messages.fresh recommendations") }}</h2>

          <div class="recommendations-content">
            @if ($offer_ads->count())
              <div class="recommendation-items" id="recommendation_items_offer">
                @foreach ($offer_ads as $ad)
                    <x-ad-card :ad='$ad' class="" />
                @endforeach
              </div>
              <div class="flex justify-center items-center my-[1.5rem] w-full">
                {{ $ads->links() }}
              </div>
            @else
              <div class="flex justify-center items-center w-full">
                <p class="text-[0.9rem] text-[#000000] capitalize font-[500]">{{ __("messages.no offers yet. please check back later") }}</p>  
              </div>
            @endif
          </div>

          <div class="w-full h-[0.1rem] bg-slate-500 my-[1.5rem]"></div>

          <h2>{{ __("messages.all ads") }}</h2>

          <div class="recommendations-content">
            @if ($ads->count())
              <div class="recommendation-items" id="recommendation_items">
                @foreach ($ads as $ad)
                  <x-ad-card :ad='$ad' class="" />
                @endforeach
              </div>
              <div class="flex justify-center items-center my-[1.5rem] w-full">
                {{ $ads->links() }}
              </div>
            @else
              <div class="flex justify-center items-center w-full">
                <p class="text-[0.9rem] text-[#000000] capitalize font-[500]">{{ __("messages.no ads yet. please check back later") }}</p>  
              </div>
            @endif
          </div>
          
        </div>
      </div>
    </section>

    @push('scripts')
      <script>
        $(function () {
          $(".home .owl-carousel").owlCarousel({
              loop: true,
              items: 1,
              nav: false,
              dots: true,
              center: true,
              autoplay: true,
              animateOut: "fadeOut",
              rtl: true,
          });

          $(document).on("keyup", "#search_home", function () {
            let searchHome = $(this).val();
            
            $.ajax({
              type: "GET",
              url: "{{ route('home.search') }}",
              data: {
                "search": searchHome
              },
              cache: false,

              success: function (response) {
                $("#recommendation_items").html(response);
              }
            });
          })

          $(document).on("change", "#category_governorate_id", function () {
            let data = $(this).find(":selected").val();

            $.ajax({
              type: "GET",
              url: "{{ route('home.search') }}",
              data: {
                "category_governorate": data
              },
              cache: false,

              success: function (response) {
                $("#recommendation_items").html(response);
              }
            });
          });
          
          $(document).on("click", ".link", function(e) {
            e.preventDefault();
            let data = $(this).attr("data-val");

            if(data === "trusted") {
              $.ajax({
                type: "GET",
                url: "{{ route('home.search') }}",
                data: {
                  "certification": data
                },
                cache: false,

                success: function (response) {
                  $("#recommendation_items").html(response);
                }
              });
            }

            if(data == "last_24_hours"){
              $.ajax({
                type: "GET",
                url: "{{ route('home.search') }}",
                data: {
                  "last_day": data
                },
                cache: false,

                success: function (response) {
                  $("#recommendation_items").html(response);
                }
              });
            }

            if(data == "special offer" || data == "عرض مميز") {
              $.ajax({
                type: "GET",
                url: "{{ route('home.offer_name') }}",
                data: {
                  "offer_name": data
                },
                cache: false,

                success: function (response) {
                  $("#recommendation_items_offer").html(response);
                }
              });
            }
          });
        });
      </script>
    @endpush

</x-layouts.front-end.application>

