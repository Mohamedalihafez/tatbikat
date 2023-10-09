<header class="header">
    <div class="header-inputs">
      <div class="l-container">
        <div class="logo">
           <img href="{{ route("index") }}" class="block h-12 w-auto"
                    src="{{ asset("frontEnd/assets/image/on_fire.png") }}"
                    alt=""
            />
        </div>

        <div class="form">
          <div class="form_content">
            <div class="categories categories-drop">
              <select name="category_governorate_id" id="category_governorate_id">
                <option disabled selected>{{ __("messages.select your city") }}</option>
                @foreach (App\Models\Governorate::where("status", "active")->get() as $governorate)
                <option value="{{ $governorate->id }}">{{ $governorate->translate()->name }}</option>
                @endforeach
              </select>
            </div>
  
            <div class="search-box">
              <input
                type="text"
                name="search"
                id="search_home"
                placeholder="{{ __("messages.searching for what") }}"
              />
              <button>
                <i class="bx bx-search"></i>
              </button>
            </div>
          </div>
        </div>

        <div class="links">

          <div class="{{ App::getLocale() === "ar" ? "sm:ml-[1rem] lg:ml-[0.5rem]" : "sm:mr-[1rem] lg:mr-[0.5rem]" }}">
            <ul>
              <li class="lang relative px-[0.5rem] py-[0.2rem] cursor-pointer hover:underline">
                <span class="text-[1rem] font-[700] capitalize">{{ __("messages.language") }}</span>

                <ul class="subMenu absolute py-[1.5rem] w-[10rem] left-0 bg-white z-[10001]">
                  @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <li class="w-full">
                      <a class="w-full flex items-center justify-center mb-[0.5rem] text-[1rem] font-[600] capitalize hover:underline" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                        {{ $properties['native'] }}
                      </a>
                    </li>
                  @endforeach
                </ul>
              </li>
            </ul>
          </div>
          
          @auth
            <div class="{{ App::getLocale() === "en" ? "sm:mr-[1rem]" : "sm:ml-[1rem]" }}">
              <a href="{{ url("/chatify") }}" class="flex items-center p-[0.5rem] hover:bg-slate-300 rounded-full">
                <i class='bx bx-message-square-dots text-[2.1rem]'></i>
              </a>
            </div>

            <div class="profile" id="profile_icon">
              <div class="profile_link">
                <span>
                  <img
                    src="{{ asset("frontEnd/assets/image/iconProfilePicture.7975761176487dc62e25536d9a36a61d.png") }}"
                    alt=""
                  />
                </span>
                <span><i class="bx bx-chevron-down"></i></span>

                <ul class="sub_menu" id="subMenuProfile">
                  <li class="sub_menu-link">
                    <a href="{{ route("users.wallet") }}">
                      <i class='bx bx-credit-card'></i>
                      <div>
                        <p>{{ __("messages.fire wallet") }}</p>
                        <p class="text-[0.73rem]">{{ __("messages.balance") . ":" . " " . auth()->user()->wallet_balance . " " . __("messages.egp") }}</p>
                      </div>
                    </a>
                  </li>

                  <div class="border"></div>

                  <li class="sub_menu-link">
                    <a href="{{ route("profile.show") }}"><i class="bx bx-user"></i>{{ __("messages.my profile") }}</a>
                  </li>

                  <div class="border"></div>

                  <li class="sub_menu-link">
                    <a href="{{ route("users.my-ads") }}"><i class="bx bx-cart-add"></i>{{ __("messages.my ads") }}</a>
                  </li>

                  <div class="border"></div>

                  <li class="sub_menu-link">
                    <form action="{{ route("logout") }}" method="post">
                      @csrf

                      <button class="flex items-center w-full py-[0.8rem] px-[0.5rem] capitalize font-[500] focus:outline-none hover:bg-[#ffb600] hover:text-white" type="submit"><i class="bx bx-log-out text-[1.8rem] leading-none {{ App::getLocale() === "ar" ? "ml-[1rem]" : "mr-[1rem]" }}"></i>{{ __("messages.logout") }}</button>
                    </form>
                  </li>
                </ul>
              </div>
            </div>
          @endauth

          @guest
            <div class="sign-in">
              <a href="{{ route("login") }}" class="capitalize">{{ __("messages.login") }}</a>
            </div>
          @endguest

          <div class="sell">
            <a href="{{ route("ad.sell") }}"
              ><i class="bx bx-plus"></i><span class="ml-[0.3rem] uppercase">{{ __("messages.sell") }}</span></a
            >
          </div>
        </div>

        <div class="toggles">
          <i class="bx bx-align-middle"></i>
        </div>
      </div>
    </div>

    <nav class="nav">
      <div class="l-container">
        <ul>
          @foreach (App\Models\MainCategory::where("status", "active")->get() as $mainCategory)
          <li>
            {{ $mainCategory->translate()->name }}

            <ul class="submenu">
              @foreach ($mainCategory->subCategories as $subCategory)
                <x-sub-menu-link>
                  <a href="{{ route("home.category", $subCategory->slug) }}">{{ $subCategory->translate()->name }}</a>
                </x-sub-menu-link>
              @endforeach
            </ul>
          </li>
          @endforeach
        </ul>

        <div class="close">
          <i class="bx bx-x"></i>
        </div>
      </div>
    </nav>
  </header>