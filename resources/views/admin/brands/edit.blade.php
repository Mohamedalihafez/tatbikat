
<x-layouts.back-end.application>

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Brands/</span> Edit Brand</h4>

        <!-- Basic Layout -->
        <div class="row">
          <div class="col-xl">
            <div class="card mb-4">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Edit Brand</h5>
                <small class="text-muted float-end">Edit Brand {{ $brand->name }}</small>
              </div>
              <div class="card-body">
                <form method="POST" action="{{ route("admin.brands.update", $brand->slug) }}" enctype="multipart/form-data">
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
                              value="{{ old($locale . '.name', $brand->translate($locale)->name) }}"
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
                            value="{{ old("slug", $brand->slug) }}"
                            aria-describedby="basic-icon-default-company2"
                        />
                    </div>
                    <div class="error">
                      @error('slug')
                        <p>{{ $message }}</p>
                      @enderror
                    </div>
                  </div>

                  <div class="mb-3">
                    <div class="form-check">
                      <input
                        name="status"
                        class="form-check-input"
                        type="radio"
                        value="active"
                        id="active"
                        {{ $brand->status == "active" ? "checked" : "" }}
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
                        {{ $brand->status == "inactive" ? "checked" : "" }}
                      />
                      <label class="form-check-label" for="inactive"> Inactive </label>
                    </div>
                  </div>

                  <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-fullname">Picture</label>
                    <div class="input-group">
                        <label class="input-group-text" for="inputGroupFile01">Upload</label>
                        <input type="file" name="thumbnail" class="form-control" id="inputGroupFile01" />
                    </div>
                    <div class="error">
                      @error('thumbnail')
                        <p>{{ $message }}</p>
                      @enderror
                    </div>
                  </div>

                  <button type="submit" class="btn btn-primary">Update</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

</x-layouts.back-end.application>