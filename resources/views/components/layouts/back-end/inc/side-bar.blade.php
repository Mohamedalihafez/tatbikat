<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
      <a href="{{ route("dashboard") }}" class="app-brand-link">
        <span class="app-brand-text demo menu-text fw-bolder ms-2">{{ __("admin.Dashboard") }}</span>
      </a>

      <a href="" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
        <i class="bx bx-chevron-left bx-sm align-middle"></i>
      </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
      
      <!-- Dashboard -->
      <li class="menu-item {{ request()->routeIs("dashboard") ? "active" : "" }}">
        <a href="{{ route("dashboard") }}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-home-circle"></i>
          <div data-i18n="Analytics">{{ __("admin.Dashboard") }}</div>
        </a>
      </li>

      {{-- <li class="menu-header small text-uppercase">
        <span class="menu-header-text">{{ __("admin.pages") }}</span>
      </li> --}}

      {{-- Users --}}
      <li class="menu-item {{ request()->routeIs("admin.users.index") ? "active open" : "" }}">
        <a href="{{ route("admin.users.index") }}" class="menu-link  ">
          <i class="menu-icon tf-icons bx bx-user"></i>
          <div data-i18n="Account Settings">{{ __("admin.users") }}</div>
        </a>
        {{-- <ul class="menu-sub">
          <li class="menu-item {{ request()->routeIs("admin.users.index") ? "active" : "" }}">
            <a href="{{ route("admin.users.index") }}" class="menu-link">
              <div data-i18n="Account">{{ __("admin.all users") }}</div>
            </a>
          </li>
        </ul> --}}
      </li>

      {{-- Admins --}}
      <li class="menu-item {{ request()->routeIs("admin.admins.index") ? "active open" : "" }}">
        <a href="{{ route("admin.admins.index") }}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-user"></i>
          <div data-i18n="Account Settings">{{ __("admin.admins") }}</div>
        </a>
        {{-- <ul class="menu-sub">
          <li class="menu-item {{ request()->routeIs("admin.admins.index") ? "active" : "" }}">
            <a href="{{ route("admin.admins.index") }}" class="menu-link">
              <div data-i18n="Account">{{ __("admin.all admins") }}</div>
            </a>
          </li>
        </ul> --}}
      </li>
      <li class="menu-item {{ request()->routeIs("admin.ads.index", "admin.ads.edit") ? "active open" : "" }}">
          <a href="{{ route("admin.ads.index") }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-dock-top"></i>
          <div data-i18n="Account Settings">{{ __("admin.ads") }}</div>
        </a>
        {{-- <ul class="menu-sub">
          <li class="menu-item {{ request()->routeIs("admin.ads.index") ? "active" : "" }}">
            <a href="{{ route("admin.ads.index") }}" class="menu-link">
              <div data-i18n="Notifications">{{ __("admin.all ads") }}</div>
            </a>
          </li>
        </ul> --}}
      </li>
      {{-- Main Categories --}}
      <li class="menu-item {{ request()->routeIs("admin.categories.index", "admin.categories.create", "admin.categories.edit") ? "active open" : "" }}">
          <a href="{{ route("admin.categories.index") }}" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-dock-top"></i>
          <div data-i18n="Account Settings">{{ __("admin.main category") }}</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item {{ request()->routeIs("admin.categories.create") ? "active" : "" }}">
            <a href="{{ route("admin.categories.create") }}" class="menu-link">
              <div data-i18n="Account">{{ __("admin.Publish Main Category") }}</div>
            </a>
          </li>
          <li class="menu-item {{ request()->routeIs("admin.categories.index") ? "active" : "" }}">
            <a href="{{ route("admin.categories.index") }}" class="menu-link">
              <div data-i18n="Notifications">{{ __("admin.all main category") }}</div>
            </a>
          </li>
        </ul>
      </li>

  
      {{-- Sub Categories --}}
      <li class="menu-item {{ request()->routeIs("admin.subCategories.index", "admin.subCategories.create", "admin.subCategories.edit") ? "active open" : "" }}">
        <a href="" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-dock-top"></i>
          <div data-i18n="Account Settings">{{ __("admin.sub category") }}</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item {{ request()->routeIs("admin.subCategories.create") ? "active" : "" }}">
            <a href="{{ route("admin.subCategories.create") }}" class="menu-link">
              <div data-i18n="Account">{{ __("admin.Publish Sub Category") }}</div>
            </a>
          </li>
          <li class="menu-item {{ request()->routeIs("admin.subCategories.index") ? "active" : "" }}">
            <a href="{{ route("admin.subCategories.index") }}" class="menu-link">
              <div data-i18n="Notifications">{{ __("admin.all sub category") }}</div>
            </a>
          </li>
        </ul>
      </li>

      {{-- Brands --}}
      <li class="menu-item {{ request()->routeIs("admin.brands.index", "admin.brands.create", "admin.brands.edit") ? "active open" : "" }}">
        <a href="" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-dock-top"></i>
          <div data-i18n="Account Settings">{{ __("admin.brands") }}</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item {{ request()->routeIs("admin.brands.create") ? "active" : "" }}">
            <a href="{{ route("admin.brands.create") }}" class="menu-link">
              <div data-i18n="Account">{{ __("admin.Publish Brand") }}</div>
            </a>
          </li>
          <li class="menu-item {{ request()->routeIs("admin.brands.index") ? "active" : "" }}">
            <a href="{{ route("admin.brands.index") }}" class="menu-link">
              <div data-i18n="Notifications">{{ __("admin.all brands") }}</div>
            </a>
          </li>
        </ul>
      </li>

      {{-- Governorates --}}
      <li class="menu-item {{ request()->routeIs("admin.governorates.index", "admin.governorates.create", "admin.governorates.edit") ? "active open" : "" }}">
        <a href="" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-dock-top"></i>
          <div data-i18n="Account Settings">{{ __("admin.governorates") }}</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item {{ request()->routeIs("admin.governorates.create") ? "active" : "" }}">
            <a href="{{ route("admin.governorates.create") }}" class="menu-link">
              <div data-i18n="Account">{{ __("admin.Publish Governorate") }}</div>
            </a>
          </li>
          <li class="menu-item {{ request()->routeIs("admin.governorates.index") ? "active" : "" }}">
            <a href="{{ route("admin.governorates.index") }}" class="menu-link">
              <div data-i18n="Notifications">{{ __("admin.all governorates") }}</div>
            </a>
          </li>
        </ul>
      </li>

      {{-- Cities --}}
      <li class="menu-item {{ request()->routeIs("admin.cities.index", "admin.cities.create", "admin.cities.edit") ? "active open" : "" }}">
        <a href="" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-dock-top"></i>
          <div data-i18n="Account Settings">{{ __("admin.cities") }}</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item {{ request()->routeIs("admin.cities.create") ? "active" : "" }}">
            <a href="{{ route("admin.cities.create") }}" class="menu-link">
              <div data-i18n="Account">{{ __("admin.Publish City") }}</div>
            </a>
          </li>
          <li class="menu-item {{ request()->routeIs("admin.cities.index") ? "active" : "" }}">
            <a href="{{ route("admin.cities.index") }}" class="menu-link">
              <div data-i18n="Notifications">{{ __("admin.all cities") }}</div>
            </a>
          </li>
        </ul>
      </li>

      {{-- offers --}}
      <li class="menu-item {{ request()->routeIs("admin.offers.index", "admin.offers.create", "admin.offers.edit") ? "active open" : "" }}">
        <a href="" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-dock-top"></i>
          <div data-i18n="Account Settings">{{ __("admin.offers") }}</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item {{ request()->routeIs("admin.offers.create") ? "active" : "" }}">
            <a href="{{ route("admin.offers.create") }}" class="menu-link">
              <div data-i18n="Account">{{ __("admin.Publish Offer") }}</div>
            </a>
          </li>
          <li class="menu-item {{ request()->routeIs("admin.offers.index") ? "active" : "" }}">
            <a href="{{ route("admin.offers.index") }}" class="menu-link">
              <div data-i18n="Notifications">{{ __("admin.all offers") }}</div>
            </a>
          </li>
        </ul>
      </li>

      {{-- Ads --}}
  

      {{-- Transcations --}}
      <li class="menu-item {{ request()->routeIs("admin.transactions.index", "admin.transactions.edit") ? "active open" : "" }}">
        <a href="{{ route("admin.transactions.index") }}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-dock-top"></i>
          <div data-i18n="Account Settings">{{ __("admin.transactions") }}</div>
        </a>
        {{-- <ul class="menu-sub">
          <li class="menu-item {{ request()->routeIs("admin.transactions.index") ? "active" : "" }}">
            <a href="{{ route("admin.transactions.index") }}" class="menu-link">
              <div data-i18n="Notifications">{{ __("admin.all transactions") }}</div>
            </a>
          </li>
        </ul> --}}
      </li>

      {{-- Settings --}}
      {{-- <li class="menu-item {{ request()->routeIs("admin.settings.index") ? "active open" : "" }}">
        <a href="" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-dock-top"></i>
          <div data-i18n="Account Settings">{{ __("admin.settings") }}</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item {{ request()->routeIs("admin.settings.index") ? "active" : "" }}">
            <a href="{{ route("admin.settings.index") }}" class="menu-link">
              <div data-i18n="Notifications">{{ __("admin.settings") }}</div>
            </a>
          </li>
        </ul>
      </li> --}}
    </ul>
  </aside>