
<x-layouts.front-end.application>

    <section class="offer">
        <div class="l-container">
          <div class="offer_row">
            <div class="all_details">
              <div class="thumbnails">
                <div class="container_thumbnails">
                  <div class="active_thumbnail">
                    <img
                      src="{{ asset("upload_files/ads/" . $ad->pictures[0]->thumbnail) }}"
                      class="active_image"
                      alt=""
                    />
                  </div>

                  <div class="box_thumbnails overflow-x-scroll">
                    @foreach ($ad->pictures as $picture)
                      <div class="box_thumbnail">
                        <img
                          src="{{ asset("upload_files/ads/" . $picture->thumbnail) }}"
                          alt=""
                          class="thumbnail mb-[0.5rem]"
                        />
                      </div>
                    @endforeach
                  </div>
                </div>
              </div>
  
              <div class="offer_all_detials">
                <div class="all-details">
                  <div class="headline">
                    <h1>{{ __("my_ads.details") }}</h1>
                  </div>
  
                  <div class="cols">
                    <div class="col">
                      <p>{{ __("my_ads.brand") }}</p>
                      <p>{{ __("my_ads.price type") }}</p>
                      <p>{{ __("my_ads.is deliverable") }}</p>
                    </div>
  
                    <div class="col">
                      <p>{{ $ad->brand_id ? $ad->brand->name : " " }}</p>
                      <p>{{ __("my_ads.price") }}</p>
                      <p>{{ __("my_ads.no") }}</p>
                    </div>
  
                    <div class="col">
                      <p>{{ __("my_ads.price") }}</p>
                      <p>{{ __("my_ads.condition") }}</p>
                    </div>
  
                    <div class="col">
                      <p>{{ $ad->price }}</p>
                      <p>{{ $ad->condition }}</p>
                    </div>
                  </div>
                </div>
  
                <div class="all-details">
                  <div class="headline">
                    <h1>{{ __("my_ads.description") }}</h1>
                  </div>
  
                  <div class="prog">
                    <p>
                      {{ $ad->description }}
                    </p>
                  </div>
                </div>

                @auth
                  @if ($ad->user->id === auth()->user()->id)
                    <div class="my-[1.5rem] flex">
                      <a href="{{ route("posts.edit", $ad->slug) }}" class=" bg-yellow-600 text-[#f1f1f1] text-[1rem] uppercase font-[700] py-[0.5rem] px-[1.2rem] rounded-md">{{ __("my_ads.edit") }}</a>

                      <form action="{{ route("posts.destroy", $ad->slug) }}" method="post" class="{{ App::getLocale() == "en" ? "ml-[1rem]" : "mr-[1rem]" }}">
                        @csrf
                        @method("DELETE")

                        <button type="submit" class=" bg-red-700 text-[#f1f1f1] text-[1rem] uppercase font-[700] py-[0.5rem] px-[1.2rem] rounded-md">{{ __("my_ads.delete") }}</button>
                      </form>
                    </div>
                  @endif
                @endauth
              </div>
            </div>
  
            <div class="offer_details">
              <div class="box_details">
                <div class="box_details-row">
                  <h1 class="uppercase">{{ __("my_ads.egp") . " " . $ad->price }}</h1>

                  @auth
                  <div class="icon" id="favorate">
                    <form method="post" id="form_fav">         

                      <input type="hidden" id="ad_id" value="{{ $ad->id }}">

                      <button type="submit" class="">
                        <i class="bx {{ auth()->user()->favoriteHas($ad->id) ? "bxs-heart" : "bx-heart" }} font-[600]" id="heart"></i>
                      </button>
                    </form>
                  </div>
                  @endauth
                </div>

                <h2 class="text-[0.9rem] font-[700] text-gray-600">{{ $ad->name }}</h2>

                <div class="my-[1rem] flex flex-col">
                  <h2 class="text-[1.1rem] font-[700] text-black capitalize">{{ __("my_ads.share on social media") }}</h2>

                  <div class="flex mt-[0.5rem]">
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ route("posts.show", $ad->slug) }}" 
                      target="_block" 
                      class="flex justify-center items-center h-12 w-12 bg-gray-300 rounded-full text-[1.5rem] mr-[1rem]"
                    >
                      <i class='bx bxl-facebook'></i>
                    </a>
  
                    <a href="https://www.twitter.com/intent/tweet/?text={{ $ad->name }}&url={{ route("posts.show", $ad->slug) }}" 
                      target="_block" 
                      class="flex justify-center items-center h-12 w-12 bg-gray-300 rounded-full text-[1.5rem] mr-[1rem]"
                    >
                      <i class='bx bxl-twitter' ></i>
                    </a>
                  </div>
                </div>

                <div class="city">
                  <div class="prog">
                    <p>{{ $ad->city->name . ", " . $ad->governorate->name }}</p>
                  </div>
                  <div class="time">
                    <p>{{ $ad->created_at->diffForHumans() }}</p>
                  </div>
                </div>
              </div>
  
              <div class="box_details">
                <div class="headline">
                  <h2 class="capitalize">{{ __("my_ads.seller description") }}</h2>
                </div>

                <div class="user_row cursor-pointer hover:bg-slate-300 rounded-[0.5rem] p-[0.2rem]">
                  <div class="box_img">
                    <img src="https://ui-avatars.com/api/?background=0D8ABC&color=fff&name={{ $ad->user->name }}" alt="{{ $ad->user->name }}" />
                  </div>
  
                  <div class="user_details flex-1">
                    <h1>{{ $ad->user->name }}</h1>
                    <h4 class="capitalize">{{ __("my_ads.member since") . " " . $ad->user->created_at->diffForHumans() }}</h4>
                  </div>
  
                  <div class="icon">
                    <i class="bx bx-chevron-{{ App::getLocale() === "en" ? "right" : "left" }}"></i>
                  </div>
                </div>

                @if ($ad->contact == "both" || $ad->contact == "chat")
                <a href="{{ url("/chatify") }}">
                  <div class="w-full my-7">
                    <div class="w-full py-[0.7rem] bg-yellow-600 text-[#f1f1f1] rounded-lg border-[1px] border-yellow-600 hover:bg-transparent hover:text-yellow-600">
                      <h2 class="w-full text-center font-[700] text-[1rem]">{{ __("my_ads.send message") }}</h2>
                    </div>
                  </div>
                </a> 
                @endif

                @if ($ad->contact == "both" || $ad->contact == "phone")
                <div class="w-full mt-4">
                  <div class="w-full pl-[1rem]">
                    <h2 class="font-[700] text-[1rem]">{{ __("my_ads.tel") . " : " . $ad->user_phone }}</h2>
                  </div>
                </div>
                @endif
              </div>
  
              <div class="box_details">
                <div class="headline_safety">
                  <h2>{{ __("my_ads.your safety matters to us") }}</h2>
                </div>
  
                <div class="safety_details">
                  <div class="safety_details-row">
                    <span>*</span>
                    <span
                      >{{ __("my_ads.only meet in public / crowded places for example metro stations and malls") }}.</span
                    >
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>

    @push('scripts')
        <script>
          const active_thumbnail = document.querySelector(
              ".active_thumbnail .active_image"
          );
          const thumbnails = document.querySelectorAll(".thumbnail");

          thumbnails.forEach((thumbnail) => {
              thumbnail.onclick = (ele) => {
                  active_thumbnail.src = ele.currentTarget.src;
              };
          });

          
          $(function() {
            $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });

            $("#form_fav").on("submit", function (e) {
              e.preventDefault();

              let ad_id = $("#ad_id").val();

              if($("#heart").hasClass("bx-heart")){

                $.ajax({
                  type: "POST",
                  url: "{{ route('posts.favorite') }}",
                  headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                  data: {
                    "ad_id": ad_id
                  },
                  cache: false,

                  success: function (response) {
                    $("#heart").removeClass("bx-heart");
                    $("#heart").addClass("bxs-heart");
                  }
                });

                

              }else{

                $.ajax({
                  type: "POST",
                  url: "{{ route('posts.favorite.delete') }}",
                  headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                  data: {
                    "ad_id": ad_id
                  },
                  cache: false,

                  success: function (response) {
                    $("#heart").removeClass("bxs-heart");
                    $("#heart").addClass("bx-heart");
                  }
                });
              }
            });
          });
        </script>
    @endpush

</x-layouts.front-end.application>