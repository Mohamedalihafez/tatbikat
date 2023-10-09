
<x-layouts.back-end.application>

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Categories/</span> Publish New Category</h4>

        <!-- Basic Layout -->
        <div class="row">
          <div class="col-xl">
            <div class="card mb-4">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Publish New Sub Category</h5>
                <small class="text-muted float-end">Publish New Sub Category</small>
              </div>
              <div class="card-body">
                <form method="POST" action="{{ route("admin.subCategories.update", $subCategory->slug) }}" autocomplete="off" enctype="multipart/form-data">
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
                              value="{{ old($locale . '.name', $subCategory->translate($locale)->name) }}"
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
                            value="{{ old("slug", $subCategory->slug) }}"
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
                    <label class="form-label" for="basic-icon-default-company">Status</label>

                    <div class="form-check">
                      <input
                        name="status"
                        class="form-check-input"
                        type="radio"
                        value="active"
                        id="active"
                        {{ $subCategory->status == "active" ? "checked" : "" }}
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
                        {{ $subCategory->status == "inactive" ? "checked" : "" }}
                      />
                      <label class="form-check-label" for="inactive"> Inactive </label>
                    </div>
                    <div class="error">
                      @error('status')
                        <p>{{ $message }}</p>
                      @enderror
                    </div>
                  </div>

                  <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-fullname">Select Main Category</label>
                    <div class="input-group">
                      <label class="input-group-text" for="inputGroupSelect01">Select Main Category</label>
                      <select class="form-select" id="inputGroupSelect01" name="main_category_id">
                        <option selected>Choose...</option>
                        @foreach (App\Models\MainCategory::all() as $category)
                          <option value="{{ $category->id }}" {{ $category->id === $subCategory->mainCategory->id ? "selected" : "" }}>{{ $category->name }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="error">
                      @error('main_category_id')
                        <p>{{ $message }}</p>
                      @enderror
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