
<x-layouts.front-end.application>

    <section class="create_offer my-[2rem]">
        <div class="l-container">
          <div class="create_offer_content">
            <form action="{{ route("posts.update", $ad->slug) }}" id="form" method="POST" enctype="multipart/form-data">
              @csrf
              @method("PATCH")

              <div class="head_form">
                <h2>{{ __("post.update some details") }}</h2>
              </div>
  
              {{-- Name of ad --}}
              <div class="box_input">
                <label for="Ad_title">{{ __("post.ad title") }}</label>
                <input type="text" class="input" id="Ad_title" name="name" value="{{ old("name", $ad->name) }}" />
                <div class="error_message">
                  @error('name')
                  <p>{{ $message }}</p>
                  @enderror
                </div>
              </div>

              {{-- slug of ad --}}
              <div class="box_input">
                <label for="Ad_slug">{{ __("post.ad slug") }}</label>
                <input type="text" class="input" id="Ad_slug" name="slug" value="{{ old("slug", $ad->slug) }}" />
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
                    {{ __("post.choosing brand") . "..." }}
                  </option>

                  @foreach (App\Models\Brand::where("status", "active")->get() as $brand)
                    <option {{ old("brand_id", $ad->brand_id) == $brand->id ? "selected" : "" }} value="{{ $brand->id }}">
                      <span>{{ $brand->name }}</span>
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
                  <label for="radio_type_1" class="radio_method {{ App::getLocale() == "en" ? "mr-[.5rem]" : "ml-[.5rem]" }}">
                    <input type="radio" id="radio_type_1" class="{{ App::getLocale() == "en" ? "mr-[.5rem]" : "ml-[.5rem]" }}" name="type" value="phone" {{ $ad->type === "phone" ? "checked" : "" }} />
                    <span>Phone number</span>
                  </label>

                  <label for="radio_type_2" class="radio_method {{ App::getLocale() == "en" ? "mr-[.5rem]" : "ml-[.5rem]" }}">
                    <input type="radio" id="radio_type_2" class="{{ App::getLocale() == "en" ? "mr-[.5rem]" : "ml-[.5rem]" }}" name="type" value="chat" {{ $ad->type === "chat" ? "checked" : "" }} />
                    <span>chat</span>
                  </label>

                  <label for="radio_type_3" class="radio_method">
                    <input type="radio" id="radio_type_3" class="{{ App::getLocale() == "en" ? "mr-[.5rem]" : "ml-[.5rem]" }}" name="type" value="both" {{ $ad->type === "both" ? "checked" : "" }} />
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
                  <label for="radio_condition_new" class="radio_method {{ App::getLocale() == "en" ? "mr-[.5rem]" : "ml-[.5rem]" }}">
                    <input type="radio" id="radio_condition_new" class="{{ App::getLocale() == "en" ? "mr-[.5rem]" : "ml-[.5rem]" }}" name="condition" value="new" {{ $ad->condition === "new" ? "checked" : "" }} />
                    <span>{{ __("post.New") }}</span>
                  </label>

                  <label for="radio_condition_old" class="radio_method {{ App::getLocale() == "en" ? "mr-[.5rem]" : "ml-[.5rem]" }}">
                    <input type="radio" id="radio_condition_old" class="{{ App::getLocale() == "en" ? "mr-[.5rem]" : "ml-[.5rem]" }}" name="condition" value="used" {{ $ad->condition === "used" ? "checked" : "" }} />
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
                <textarea name="description" id="Description">{{ old("description", $ad->description) }}</textarea>
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
                <input type="number" class="input" id="price" name="price" value="{{ old("price", $ad->price) }}" />
                <div class="error_message">
                  @error('price')
                  <p>{{ $message }}</p>
                  @enderror
                </div>
              </div>
  
              <div class="border bg-black"></div>

              {{-- Thumbnail --}}
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
                <div class="my-[0.5rem] w-[13rem] h-[10rem]">
                    <img class="w-full h-full rounded-[1rem]" src="{{ asset("upload_files/ads/" . $ad->thumbnail) }}" alt="">
                </div>
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
                <div class="my-[0.5rem] flex flex-wrap">
                    @foreach ($ad->pictures as $picture)
                        <img class="rounded-[1rem] w-[13rem] h-[10rem] mr-[0.5rem] mb-[0.5rem]" src="{{ asset("upload_files/ads/" . $picture->thumbnail) }}" alt="">
                    @endforeach
                </div>
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
                    <option value="{{ $governorate->id }}" {{ $ad->governorate_id == $governorate->id ? "selected" : "" }}>
                      <span>{{ $governorate->name }}</span>
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
              <div class="box_input">
                <label for="Brand">{{ __("post.Select Cities") }}</label>
                <select name="city_id" id="city_id">
                    <option selected disabled>
                      {{ __("post.Choosing Location") . "..." }}
                    </option>
    
                    @foreach ($cities as $city)
                    <option value="{{ $city->id }}" {{ $ad->city_id == $city->id ? "selected" : "" }}>
                        <span>{{ $city->name }}</span>
                    </option>
                    @endforeach
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
                <div class="w-[5.5rem] h-[5.5rem] rounded-full mr-[1.3rem]">
                  <img class="w-full h-full" src="{{ asset("frontEnd/assets/image/iconProfilePicture.7975761176487dc62e25536d9a36a61d.png") }}" alt="">
                </div>
                <div class="box_input">
                  <label for="Name">{{ __("post.Name") }}</label>
                  <input type="text" id="Name" class="input" name="user_name" value="{{ old("user_name", $ad->user_name) }}" />
                  <div class="error_message">
                    @error('user_name')
                    <p>{{ $message }}</p>
                    @enderror
                  </div>
                </div>
              </div>
  
              <div class="box_input">
                <label for="mobile">{{ __("post.Mobile Phone Number") }}</label>
                <input type="number" id="mobile" class="input" name="user_phone" value="{{ old("user_phone", $ad->user_phone) }}" />
                <div class="error_message">
                  @error('user_phone')
                  <p>{{ $message }}</p>
                  @enderror
                </div>
              </div>
  
              <div class="box_input">
                <label>{{ __("post.Contact Method") }}</label>

                <div class="flex mt-[1rem]">
                  <label for="radio_phone" class="radio_method {{ App::getLocale() == "en" ? "mr-[.5rem]" : "ml-[.5rem]" }}">
                    <input type="radio" id="radio_phone" class="{{ App::getLocale() == "en" ? "mr-[.5rem]" : "ml-[.5rem]" }}" name="contact" {{ old("contact", $ad->contact) === "phone" ? "checked" : "" }} value="phone" />
                    <span>{{ __("post.Phone number") }}</span>
                  </label>
    
                  <label for="radio_chat" class="radio_method {{ App::getLocale() == "en" ? "mr-[.5rem]" : "ml-[.5rem]" }}">
                    <input type="radio" id="radio_chat" class="{{ App::getLocale() == "en" ? "mr-[.5rem]" : "ml-[.5rem]" }}" name="contact" {{ old("contact", $ad->contact) === "chat" ? "checked" : "" }} value="chat" />
                    <span>{{ __("post.chat") }}</span>
                  </label>
    
                  <label for="radio_both" class="radio_method">
                    <input type="radio" id="radio_both" class="{{ App::getLocale() == "en" ? "mr-[.5rem]" : "ml-[.5rem]" }}" name="contact" {{ old("contact", $ad->contact) === "both" ? "checked" : "" }} value="both" />
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
  
              <div class="box_input">
                <button type="submit">{{ __("post.update") }}</button>
              </div>
            </form>
          </div>
        </div>
    </section>

</x-layouts.front-end.application>