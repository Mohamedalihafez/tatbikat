
<x-layouts.back-end.application>

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">City/</span> Publish New City</h4>

        <!-- Basic Layout -->
        <div class="row">
          <div class="col-xl">
            <div class="card mb-4">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Publish New City</h5>
                <small class="text-muted float-end">Publish New City</small>
              </div>
              <div class="card-body">
                <form method="POST" action="{{ route("admin.cities.update", $city->slug) }}" autocomplete="off">
                  @csrf
                  @method("PATCH")

                  @foreach (config("translatable.locales") as $locale)
                    {{-- Name --}}
                    <div class="mb-3">
                      <label class="form-label" for="basic-icon-default-fullname">{{ __("admin.name" . " " . $locale) }}</label>
                      <div class="input-group input-group-merge">
                          <span id="basic-icon-default-fullname2" class="input-group-text"
                              ><i class="bx bx-user"></i
                          ></span>
                          <input
                              type="text"
                              class="form-control"
                              id="basic-icon-default-fullname"
                              name="{{ $locale . "[name]" }}"
                              placeholder="type here the name"
                              aria-label="John Doe"
                              autofocus
                              value="{{ old($locale . ".name", $city->translate($locale)->name) }}"
                              aria-describedby="basic-icon-default-fullname2"
                          />
                      </div>
                      <div class="error">
                        @error($locale . '.name')
                          <p>{{ $message }}</p>
                        @enderror
                      </div>
                    </div>
                  @endforeach

                  {{-- Slug --}}
                  <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-company">Slug</label>
                    <div class="input-group input-group-merge">
                        <span id="basic-icon-default-company2" class="input-group-text"
                            ><i class="bx bx-buildings"></i
                        ></span>
                        <input
                            type="text"
                            id="basic-icon-default-company"
                            class="form-control"
                            placeholder="Type here the slug"
                            name="slug"
                            value="{{ old("slug", $city->slug) }}"
                            aria-describedby="basic-icon-default-company2"
                        />
                    </div>
                    <div class="error">
                      @error('slug')
                        <p>{{ $message }}</p>
                      @enderror
                    </div>
                  </div>

                  @foreach (config("translatable.locales") as $locale)
                    {{-- Street 1 --}}
                    <div class="mb-3">
                      <label class="form-label" for="basic-icon-default-fullname">{{ __("admin.street 1" . " " . $locale) }}</label>
                      <div class="input-group input-group-merge">
                          <span id="basic-icon-default-fullname2" class="input-group-text"
                              ><i class="bx bx-user"></i
                          ></span>
                          <input
                              type="text"
                              class="form-control"
                              id="basic-icon-default-fullname"
                              name="{{ $locale . "[street_1]" }}"
                              placeholder="type here the name"
                              aria-label="John Doe"
                              autofocus
                              value="{{ old($locale . ".street_1", $city->translate($locale)->street_1) }}"
                              aria-describedby="basic-icon-default-fullname2"
                          />
                      </div>
                      <div class="error">
                        @error($locale . '.street_1')
                          <p>{{ $message }}</p>
                        @enderror
                      </div>
                    </div>

                    {{-- Street 2 --}}
                    <div class="mb-3">
                      <label class="form-label" for="basic-icon-default-fullname">{{ __("admin.street 2" . " " . $locale) }}</label>
                      <div class="input-group input-group-merge">
                          <span id="basic-icon-default-fullname2" class="input-group-text"
                              ><i class="bx bx-user"></i
                          ></span>
                          <input
                              type="text"
                              class="form-control"
                              id="basic-icon-default-fullname"
                              name="{{ $locale . "[street_2]" }}"
                              placeholder="type here the name"
                              aria-label="John Doe"
                              autofocus
                              value="{{ old($locale . ".street_2", $city->translate($locale)->street_2) }}"
                              aria-describedby="basic-icon-default-fullname2"
                          />
                      </div>
                      <div class="error">
                        @error($locale . '.street_2')
                          <p>{{ $message }}</p>
                        @enderror
                      </div>
                    </div>
                  @endforeach

                  {{-- Select Governorate --}}
                  <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-fullname">Select Governorate</label>
                    <div class="input-group">
                      <label class="input-group-text" for="inputGroupSelect01">Select Governorate</label>
                      <select class="form-select" id="inputGroupSelect01" name="governorate_id">
                        <option selected>Choose Governorate...</option>
                        @foreach (App\Models\Governorate::all() as $governorate)
                          <option value="{{ $governorate->id }}" {{ $governorate->id === $city->governorate->id ? "selected" : "" }}>{{ $governorate->name }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="error">
                      @error('governorate_id')
                        <p>{{ $message }}</p>
                      @enderror
                    </div>
                  </div>

                  {{-- Status --}}
                  <div class="mb-3">
                    <div class="form-check">
                      <input
                        name="status"
                        class="form-check-input"
                        type="radio"
                        value="active"
                        id="active"
                        {{ $city->status == "active" ? "checked" : "" }}
                      />
                      <label class="form-check-label" for="active"> Active </label>
                    </div>

                    <div class="form-check">
                      <input
                        name="status"
                        class="form-check-input"
                        type="radio"
                        value="inactive"
                        id="inactive"
                        {{ $city->status == "inactive" ? "checked" : "" }}
                      />
                      <label class="form-check-label" for="inactive"> Inactive </label>
                    </div>
                  </div>
                  
                  <button type="submit" class="btn btn-primary">update</button>
                </form>
              </div>
            </div>
          </div>
        </div>
    </div>

</x-layouts.back-end.application>