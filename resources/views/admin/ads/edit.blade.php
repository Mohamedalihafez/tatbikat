

<x-layouts.back-end.application>

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">{{ __("admin.ads") }} /</span> {{ __("admin.Edit Ad") }}</h4>

        <!-- Basic Layout -->
        <div class="row">
          <div class="col-xl">
            <div class="card mb-4">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">{{ __("admin.Edit Ad") }}</h5>
                <small class="text-muted float-end">{{ __("admin.Edit Ad") }}</small>
              </div>
              <div class="card-body">

                <div class="mb-3">
                  <label class="form-label" for="basic-icon-default-fullname">Name</label>
                  <div class="input-group input-group-merge">
                      <span id="basic-icon-default-fullname2" class="input-group-text"
                          ><i class="bx bx-user"></i
                      ></span>
                      <input
                          type="text"
                          class="form-control"
                          id="basic-icon-default-fullname"
                          disabled
                          value="{{ $ad->name }}"
                          aria-describedby="basic-icon-default-fullname2"
                      />
                  </div>
                </div>

                <div class="mb-3">
                  <label class="form-label" for="basic-icon-default-fullname">Slug</label>
                  <div class="input-group input-group-merge">
                      <span id="basic-icon-default-fullname2" class="input-group-text"
                          ><i class="bx bx-user"></i
                      ></span>
                      <input
                          type="text"
                          class="form-control"
                          id="basic-icon-default-fullname"
                          disabled
                          value="{{ $ad->slug }}"
                          aria-describedby="basic-icon-default-fullname2"
                      />
                  </div>
                </div>

                <div class="mb-3">
                  <label class="form-label" for="basic-icon-default-fullname">Brand</label>
                  @if ($ad->brand != null)
                    <div class="input-group">
                      <label class="input-group-text" for="inputGroupSelect01">Brand</label>
                      <select class="form-select" disabled id="inputGroupSelect01" name="governorate_id">
                          <option selected>{{ $ad->brand->name }}</option>
                      </select>
                    </div>
                  @else 
                  <div class="form-label" for="basic-icon-default-fullname">No Brand</div>
                  @endif
                </div>

                <div class="mb-3">
                  <label class="form-label" for="basic-icon-default-fullname">type</label>
                  @if ($ad->type != null)
                    <div class="form-check">
                      <input
                        class="form-check-input"
                        type="radio"
                        id="active"
                        checked
                        disabled
                      />
                      <label class="form-check-label" for="active"> {{ $ad->type }} </label>
                    </div>
                  @else
                  <div class="form-label" for="basic-icon-default-fullname">no type</div>
                  @endif
                </div>

                <div class="mb-3">
                  <label class="form-label" for="basic-icon-default-fullname">condition</label>
                  @if ($ad->condition != null)
                  <div class="form-check">
                    <input
                      class="form-check-input"
                      type="radio"
                      checked
                      disabled
                    />
                    <label class="form-check-label" for="active"> {{ $ad->condition }} </label>
                  </div>
                  @else
                      <div class="form-label">no condition</div>
                  @endif
                </div>

                <div class="mb-3">
                  <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                  <textarea class="form-control" rows="3" disabled>{{ $ad->description }}</textarea>
                </div>

                <div class="mb-3">
                  <label class="form-label" for="basic-icon-default-fullname">price</label>
                  <div class="input-group input-group-merge">
                      <span id="basic-icon-default-fullname2" class="input-group-text"
                          ><i class="bx bx-user"></i
                      ></span>
                      <input
                          type="text"
                          class="form-control"
                          id="basic-icon-default-fullname"
                          disabled
                          value="{{ $ad->price }}"
                          aria-describedby="basic-icon-default-fullname2"
                      />
                  </div>
                </div>

                <div class="mb-3">
                  <label class="form-label" for="basic-icon-default-fullname">Basic Image</label>
                  <div class="input-group input-group-merge">
                      <img src="{{ asset("upload_files/ads/" . $ad->thumbnail) }}" style="width: 10rem; height:7rem" alt="">
                  </div>
                </div>

                <div class="mb-3">
                  <label class="form-label" for="basic-icon-default-fullname">Ad Images</label>
                  <div class="input-group input-group-merge" style="flex-wrap: wrap">
                    @foreach ($ad->pictures as $picture)
                      <img src="{{ asset("upload_files/ads/" . $picture->thumbnail) }}" style="width: 10rem; height:7rem; margin-right: 0.5rem; margin-bottom: 0.5rem;" alt="">
                    @endforeach
                  </div>
                </div>

                <div class="mb-3">
                  <label class="form-label" for="basic-icon-default-fullname">governorate</label>
                  <div class="input-group">
                    <label class="input-group-text" for="inputGroupSelect01">Governorate</label>
                    <select class="form-select" disabled id="inputGroupSelect01" name="governorate_id">
                        <option selected>{{ $ad->governorate->name }}</option>
                    </select>
                  </div>
                </div>

                <div class="mb-3">
                  <label class="form-label" for="basic-icon-default-fullname">city</label>
                  <div class="input-group">
                    <label class="input-group-text" for="inputGroupSelect01">City</label>
                    <select class="form-select" disabled id="inputGroupSelect01" name="governorate_id">
                        <option selected>{{ $ad->city->name }}</option>
                    </select>
                  </div>
                </div>

                <div class="mb-3">
                  <label class="form-label" for="basic-icon-default-fullname">Name of User</label>
                  <div class="input-group input-group-merge">
                      <span id="basic-icon-default-fullname2" class="input-group-text"
                          ><i class="bx bx-user"></i
                      ></span>
                      <input
                          type="text"
                          class="form-control"
                          id="basic-icon-default-fullname"
                          disabled
                          value="{{ $ad->user_name }}"
                          aria-describedby="basic-icon-default-fullname2"
                      />
                  </div>
                </div>

                <div class="mb-3">
                  <label class="form-label" for="basic-icon-default-fullname">phone of User</label>
                  <div class="input-group input-group-merge">
                      <span id="basic-icon-default-fullname2" class="input-group-text"
                          ><i class="bx bx-user"></i
                      ></span>
                      <input
                          type="text"
                          class="form-control"
                          id="basic-icon-default-fullname"
                          disabled
                          value="{{ $ad->user_phone }}"
                          aria-describedby="basic-icon-default-fullname2"
                      />
                  </div>
                </div>

                <div class="mb-3">
                  <label class="form-label" for="basic-icon-default-fullname">contact</label>
                  <div class="form-check">
                    <input
                      class="form-check-input"
                      type="radio"
                      checked
                      disabled
                    />
                    <label class="form-check-label" for="active"> {{ $ad->contact }} </label>
                  </div>
                </div>

                <form method="POST" action="{{ route("admin.ads.update", $ad->slug) }}" autocomplete="off">
                    @csrf
                    @method("PATCH")

                    {{-- certification --}}
                    <div class="mb-3">
                      <label class="form-label" for="basic-icon-default-fullname">{{ __("admin.certification") }}</label>
                      <div class="form-check">
                          <input
                              name="certification"
                              class="form-check-input"
                              type="radio"
                              value="trusted"
                              id="trusted"
                              {{ $ad->certification == "trusted" ? "checked" : "" }}
                          />
                          <label class="active" for="trusted"> Trusted </label>
                      </div>

                      <div class="form-check">
                          <input
                              name="certification"
                              class="form-check-input"
                              type="radio"
                              value="untrusted"
                              id="untrusted"
                              {{ $ad->certification == "untrusted" ? "checked" : "" }}
                          />
                          <label class="form-check-label" for="untrusted"> Untrusted </label>
                      </div>

                      <div class="form-check">
                          <input
                              name="certification"
                              class="form-check-input"
                              type="radio"
                              value="moderated"
                              id="moderated"
                              {{ $ad->certification == "moderated" ? "checked" : "" }}
                          />
                          <label class="form-check-label" for="moderated"> Moderated </label>
                      </div>
                    </div>

                    {{-- status --}}
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-fullname">{{ __("admin.Status") }}</label>
                        <div class="form-check">
                            <input
                                name="status"
                                class="form-check-input"
                                type="radio"
                                value="active"
                                id="active"
                                {{ $ad->status == "active" ? "checked" : "" }}
                            />
                            <label class="active" for="active"> Active </label>
                        </div>

                        <div class="form-check">
                            <input
                                name="status"
                                class="form-check-input"
                                type="radio"
                                value="inactive"
                                id="inactive"
                                {{ $ad->status == "inactive" ? "checked" : "" }}
                            />
                            <label class="form-check-label" for="inactive"> Inactive </label>
                        </div>

                        <div class="form-check">
                            <input
                            name="status"
                            class="form-check-input"
                            type="radio"
                            value="pending"
                            id="pending"
                            {{ $ad->status == "pending" ? "checked" : "" }}
                            />
                            <label class="form-check-label" for="pending"> Pending </label>
                        </div>

                        <div class="form-check">
                            <input
                                name="status"
                                class="form-check-input"
                                type="radio"
                                value="moderated"
                                id="moderated"
                                {{ $ad->status == "moderated" ? "checked" : "" }}
                            />
                            <label class="form-check-label" for="moderated"> Moderated </label>
                        </div>
                    </div>
                  
                  <button type="submit" class="btn btn-primary">{{ __("admin.update") }}</button>
                </form>
              </div>
            </div>
          </div>
        </div>
    </div>

</x-layouts.back-end.application>