
<x-layouts.back-end.application>

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Transactions/</span> Edit Transaction</h4>

        <!-- Basic Layout -->
        <div class="row">
          <div class="col-xl">
            <div class="card mb-4">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Edit Transaction</h5>
                <small class="text-muted float-end">Edit Transaction</small>
              </div>
              <div class="card-body">
                <form method="POST" action="{{ route("admin.transactions.update", [$transaction->user->id, $transaction->id]) }}" enctype="multipart/form-data">
                  @csrf
                  @method("PATCH")

                  <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-fullname">The amount you want to transfer</label>
                    <div class="input-group input-group-merge">
                        <span id="basic-icon-default-fullname2" class="input-group-text"
                            ><i class="bx bx-user"></i
                        ></span>
                        <input
                            type="number"
                            class="form-control"
                            id="basic-icon-default-fullname"
                            name="wallet_balance"
                            placeholder="type here the amount you want to transfer"
                            autofocus
                            value="{{ old("wallet_balance") }}"
                            aria-describedby="basic-icon-default-fullname2"
                        />
                    </div>
                    <div class="error">
                      @error('wallet_balance')
                        <p>{{ $message }}</p>
                      @enderror
                    </div>
                  </div>
                  
                  <button type="submit" class="btn btn-primary">send maney</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

</x-layouts.back-end.application>