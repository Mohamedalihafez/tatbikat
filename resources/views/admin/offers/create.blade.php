
<x-layouts.back-end.application>

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Offer/</span> Publish New Offer</h4>

        <!-- Basic Layout -->
        <div class="row">
          <div class="col-xl">
            <div class="card mb-4">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Publish New Offer</h5>
                <small class="text-muted float-end">Publish New Offer</small>
              </div>
              <div class="card-body">
                <form method="POST" action="{{ route("admin.offers.store") }}" autocomplete="off">
                  @csrf
                  <input hidden name="status" value="active"/>

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
                              value="{{ old($locale . '.name') }}"
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
                      <textarea class="form-control" name="{{ $locale . "[description]" }}" id="exampleFormControlTextarea1" rows="3">{{ old($locale . ".description") }}</textarea>
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
                            value="{{ old("price") }}"
                            aria-describedby="basic-icon-default-company2"
                        />
                    </div>
                    <div class="error">
                      @error('price')
                        <p>{{ $message }}</p>
                      @enderror
                    </div>
                  </div>
                  
                  <button type="submit" class="btn btn-primary">publish</button>
                </form>
              </div>
            </div>
          </div>
        </div>
    </div>

</x-layouts.back-end.application>