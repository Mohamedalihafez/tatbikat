
<x-layouts.back-end.application>

  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Offer/</span> Edit Offer</h4>

    <!-- Basic Layout -->
    <div class="row">
      <div class="col-xl">
        <div class="card mb-4">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Edit Offer</h5>
            <small class="text-muted float-end">Edit Offer</small>
          </div>
          <div class="card-body">
            <form method="POST" action="{{ route("admin.offers.update", $offer->id) }}" autocomplete="off">
              @csrf
              @method("PATCH")

              @foreach (config('translatable.locales') as $locale)
                {{-- name --}}
                <div class="mb-3">
                  <label class="form-label" for="basic-icon-default-fullname">{{ __("admin.name" . " " . $locale)  }}</label>
                  <div class="input-group input-group-merge">
                      <span id="basic-icon-default-fullname2" class="input-group-text"
                          ><i class="bx bx-user"></i
                      ></span>
                      <input
                          type="text"
                          class="form-control"
                          id="basic-icon-default-fullname"
                          name="{{ $locale . '[name]' }}"
                          placeholder="type here the name"
                          aria-label="John Doe"
                          autofocus
                          value="{{ old($locale . '.name', $offer->translate($locale)->name) }}"
                          aria-describedby="basic-icon-default-fullname2"
                      />
                  </div>
                  <div class="error">
                    @error($locale . '.name')
                      <p>{{ $message }}</p>
                    @enderror
                  </div>
                </div>

                {{-- Description --}}
                <div class="mb-3">
                  <label for="exampleFormControlTextarea1" class="form-label">{{ __("admin.description"  . " " . $locale) }}</label>
                  <textarea class="form-control" name="{{ $locale . "[description]" }}" id="exampleFormControlTextarea1" rows="3">{{ old($locale . ".description", $offer->translate($locale)->description) }}</textarea>
                  <div class="error">
                    @error($locale . 'description')
                      <p>{{ $message }}</p>
                    @enderror
                  </div>
                </div>
              @endforeach

              {{-- Price --}}
              <div class="mb-3">
                <label class="form-label" for="basic-icon-default-company">Price</label>
                <div class="input-group input-group-merge">
                    <span id="basic-icon-default-company2" class="input-group-text"
                        ><i class="bx bx-buildings"></i
                    ></span>
                    <input
                        type="text"
                        id="basic-icon-default-company"
                        class="form-control"
                        placeholder="Type here the price"
                        name="price"
                        value="{{ old("price", $offer->price) }}"
                        aria-describedby="basic-icon-default-company2"
                    />
                </div>
                <div class="error">
                  @error('price')
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
                    {{ $offer->status == "active" ? "checked" : "" }}
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
                    {{ $offer->status == "inactive" ? "checked" : "" }}
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