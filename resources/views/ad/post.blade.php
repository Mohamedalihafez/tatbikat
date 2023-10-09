
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

    <section class="create_offer">
        <div class="l-container">
          <div class="create_offer_header">
            <h1>{{ __("post.POST YOUR AD") }}</h1>
          </div>
  
          <div class="create_offer_content">
            <div class="create_offer_content-header">
              <h2>{{ __("post.SELECTED CATEGORY") }}</h2>
              <p>{{ $mainCategory->translate()->name . " " . "---" . " " . $subCategory->translate()->name }}</p>
            </div>
  
            <form action="{{ route("ad.post.store") }}" id="form" method="POST" enctype="multipart/form-data">
              @csrf

              <div class="head_form">
                <h2>{{ __("post.INCLUDE SOME DETAILS") }}</h2>
              </div>
  
              {{-- Name of ad --}}
              <div class="box_input">
                <label for="Ad_title">{{ __("post.ad title") }}</label>
                <input type="text" class="input" id="Ad_title" name="name" value="{{ old("name") }}" />
                <div class="error_message">
                  @error('name')
                  <p>{{ $message }}</p>
                  @enderror
                </div>
              </div>

              {{-- slug of ad --}}
              <div class="box_input">
                <label for="Ad_slug">{{ __("post.ad slug") }}</label>
                <input type="text" class="input" id="Ad_slug" name="slug" value="{{ old("slug") }}" />
                <div class="error_message">
                  @error('slug')
                  <p>{{ $message }}</p>
                  @enderror
                </div>
              </div>

              {{-- Brand --}}
              <div class="box_input">
                <label for="Brand">{{ __("post.brand") }} <span class="text-[0.75rem] text-slate-400">{{ __("post.option") }}</span></label>
                <select name="brand_id" id="Brand">
                  <option selected disabled>
                    {{ __("post.choosing brand") }}
                  </option>

                  @foreach (App\Models\Brand::where("status", "active")->get() as $brand)
                    <option {{ old("brand_id") == $brand->id ? "selected" : "" }} value="{{ $brand->id }}">
                      <span>{{ $brand->translate()->name }}</span>
                    </option>
                  @endforeach
                </select>
                <div class="error_message">
                  @error('brand_id')
                  <p>{{ $message }}</p>
                  @enderror
                </div>
              </div>

              {{-- type --}}
              <div class="box_input">
                <label>{{ __("post.type") }} <span class="text-[0.75rem] text-slate-400">{{ __("post.option") }}</span></label>

                <div class="flex mt-[1rem]">
                  <label for="radio_type_1" class="radio_method {{ App::getLocale() === "en" ? "mr-[.5rem]" : "ml-[.5rem]" }}">
                    <input type="radio" id="radio_type_1" class="{{ App::getLocale() === "en" ? "mr-[.5rem]" : "ml-[.5rem]" }}" name="type" value="phone" />
                    <span>Phone number</span>
                  </label>

                  <label for="radio_type_2" class="radio_method {{ App::getLocale() === "en" ? "mr-[.5rem]" : "ml-[.5rem]" }}">
                    <input type="radio" id="radio_type_2" class="{{ App::getLocale() === "en" ? "mr-[.5rem]" : "ml-[.5rem]" }}" name="type" value="chat" />
                    <span>chat</span>
                  </label>

                  <label for="radio_type_3" class="radio_method">
                    <input type="radio" id="radio_type_3" class="{{ App::getLocale() === "en" ? "mr-[.5rem]" : "ml-[.5rem]" }}" name="type" value="both" />
                    <span>BOTH</span>
                  </label>
                </div>

                <div class="error_message">
                  @error('type')
                  <p>{{ $message }}</p>
                  @enderror
                </div>
              </div>

              {{-- condition --}}
              <div class="box_input">
                <label>{{ __("post.condition") }} <span class="text-[0.75rem] text-slate-400">{{ __("post.option") }}</span></label>

                <div class="flex mt-[1rem]">
                  <label for="radio_condition_new" class="radio_method {{ App::getLocale() === "en" ? "mr-[.5rem]" : "ml-[.5rem]" }}">
                    <input type="radio" id="radio_condition_new" class="{{ App::getLocale() === "en" ? "mr-[.5rem]" : "ml-[.5rem]" }}" name="condition" value="new" />
                    <span>{{ __("post.New") }}</span>
                  </label>

                  <label for="radio_condition_old" class="radio_method {{ App::getLocale() === "en" ? "mr-[.5rem]" : "ml-[.5rem]" }}">
                    <input type="radio" id="radio_condition_old" class="{{ App::getLocale() === "en" ? "mr-[.5rem]" : "ml-[.5rem]" }}" name="condition" value="used" />
                    <span>{{ __("post.used") }}</span>
                  </label>
                </div>

                <div class="error_message">
                  @error('condition')
                  <p>{{ $message }}</p>
                  @enderror
                </div>
              </div>
  
              {{-- Description --}}
              <div class="box_input">
                <label for="Description">{{ __("post.Description") }}</label>
                <textarea name="description" id="Description">{{ old("description") }}</textarea>
                <div class="error_message">
                  @error('description')
                  <p>{{ $message }}</p>
                  @enderror
                </div>
              </div>

              <div class="border bg-black"></div>
  
              {{-- Price --}}
              <h2 class="uppercase font-[800] text-[1.25rem] mb-[0.7rem]">{{ __("post.set a price") }}</h2>
              <div class="box_input">
                <label for="price">{{ __("post.price") }}</label>
                <input type="number" class="input" id="price" name="price" value="{{ old("price") }}" />
                <div class="error_message">
                  @error('price')
                  <p>{{ $message }}</p>
                  @enderror
                </div>
              </div>
  
              <div class="border bg-black"></div>

              {{-- Thumbnails --}}
              <h2 class="uppercase font-[800] text-[1.25rem] mb-[0.7rem]">{{ __("post.UPLOAD UP PHOTOS") }}</h2>
              <div class="box_input">
                <label for="photos">{{ __("post.upload basic photo") }}</label>
                <input
                  type="file"
                  id="photos"
                  name="thumbnail"
                  class="custom-file-input input"
                  accept="image/png, image/jpeg"
                />
                <div class="error_message">
                  @error('thumbnail')
                  <p>{{ $message }}</p>
                  @enderror
                </div>
              </div>
  
              {{-- Thumbnails --}}
              <div class="box_input">
                <label for="photos">{{ __("post.upload up top 5 photos") }}</label>
                <input
                  type="file"
                  id="photos"
                  name="thumbnails[]"
                  class="custom-file-input input"
                  accept="image/png, image/jpeg"
                  multiple
                />
                <div class="error_message">
                  @error('thumbnails')
                  <p>{{ $message }}</p>
                  @enderror
                </div>
              </div>
  
              <div class="border bg-black"></div>

              {{-- Location --}}
              <h2 class="uppercase font-[800] text-[1.25rem] mb-[0.7rem]">{{ __("post.YOUR AD'S location") }}</h2>
              <div class="box_input">
                <label for="Brand">{{ __("post.Location") }}</label>
                <select name="governorate_id" id="governorate_id">
                  <option selected disabled>
                    {{ __("post.Choosing Location") . "..." }}
                  </option>
  
                  @foreach ($governorates as $governorate)
                    <option value="{{ $governorate->id }}">
                      <span>{{ $governorate->translate()->name }}</span>
                    </option>
                  @endforeach
                </select>
                <div class="error_message">
                  @error('governorate_id')
                  <p>{{ $message }}</p>
                  @enderror
                </div>
              </div>

              {{-- Location --}}
              <div class="box_input" id="cities" style="">
                <label for="Brand">{{ __("post.Select Cities") }}</label>
                <select name="city_id" id="city_id">
                </select>
                <div class="error_message">
                  @error('city_id')
                  <p>{{ $message }}</p>
                  @enderror
                </div>
              </div>
  
              <div class="border bg-black"></div>
  
              <h2 class="text-[1.25rem] font-[800] mb-[1rem] uppercase text-black">{{ __("post.REVIEW YOUR DETAILS") }}</h2>
  
              <div class="flex mb-[1.5rem]">
                <div class="w-[5.5rem] h-[5.5rem] rounded-full {{ App::getLocale() === "en" ? "mr-[1.3rem]" : "ml-[1.3rem]" }}">
                  <img class="w-full h-full" src="{{ asset("frontEnd/assets/image/iconProfilePicture.7975761176487dc62e25536d9a36a61d.png") }}" alt="">
                </div>

                <div class="box_input">
                  <label for="Name">{{ __("post.Name") }}</label>
                  <input type="text" id="Name" class="input" name="user_name" value="{{ old("user_name", Auth::user()->name) }}" />
                  <div class="error_message">
                    @error('user_name')
                    <p>{{ $message }}</p>
                    @enderror
                  </div>
                </div>
              </div>
  
              <div class="box_input">
                <label for="mobile">{{ __("post.Mobile Phone Number") }}</label>
                <input type="number" id="mobile" class="input" name="user_phone" value="{{ old("user_phone") }}" />
                <div class="error_message">
                  @error('user_phone')
                  <p>{{ $message }}</p>
                  @enderror
                </div>
              </div>
  
              <div class="box_input">
                <label>{{ __("post.Contact Method") }}</label>

                <div class="flex mt-[1rem]">
                  <label for="radio_phone" class="radio_method {{ App::getLocale() === "en" ? "mr-[.5rem]" : "ml-[.5rem]" }}">
                    <input type="radio" id="radio_phone" class="{{ App::getLocale() === "en" ? "mr-[.5rem]" : "ml-[.5rem]" }}" name="contact" {{ old("contact") == "phone" ? "checked" : "" }} value="phone" />
                    <span>{{ __("post.Phone number") }}</span>
                  </label>
    
                  <label for="radio_chat" class="radio_method {{ App::getLocale() === "en" ? "mr-[.5rem]" : "ml-[.5rem]" }}">
                    <input type="radio" id="radio_chat" class="{{ App::getLocale() === "en" ? "mr-[.5rem]" : "ml-[.5rem]" }}" name="contact" {{ old("contact") == "chat" ? "checked" : "" }} value="chat" />
                    <span>{{ __("post.chat") }}</span>
                  </label>
    
                  <label for="radio_both" class="radio_method">
                    <input type="radio" id="radio_both" class="{{ App::getLocale() === "en" ? "mr-[.5rem]" : "ml-[.5rem]" }}" name="contact" {{ old("contact") == "phone" ? "both" : "" }} value="both" />
                    <span>{{ __("post.BOTH") }}</span>
                  </label>
                </div>

                <div class="error_message">
                  @error('contact')
                  <p>{{ $message }}</p>
                  @enderror
                </div>
              </div>
  
              <div class="border bg-black"></div>

              <input type="hidden" name="main_category_id" value="{{ $mainCategory->id }}">
              <input type="hidden" name="sub_category_id" value="{{ $subCategory->id }}">
  
              <div class="box_input">
                <button type="submit">{{ __("post.Post now") }}</button>
              </div>
            </form>
          </div>
        </div>
    </section>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
      integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>

    <script type="text/javascript">
      $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
    </script>

    <script>
      $(function() {
        $(document).on("change", "#governorate_id", function() {
          let governorate_id = $(this).find(":selected").val();
          console.log(governorate_id);
          $.ajax({
            type: 'GET',
            url: '{{ route("filter") }}',
            data: { 'governorate': governorate_id },
            cache: false,

            success: function (response) {
              $("#cities").show();
              $("#city_id").html(response);
            },
          });
        });
      });
    </script>
  </body>
</html>
