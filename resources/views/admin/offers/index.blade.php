

<x-layouts.back-end.application>

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Offers /</span> All Offers</h4>
    
        <!-- Basic Bootstrap Table -->
        <div class="card overflow-hidden">
          <h5 class="card-header mb-4">All Offers</h5>
          <div class="text-wrap">
            <table class="table" id="offers-table" style="width: 100%">
              <thead>
                <tr>
                  <th>NUM</th>
                  <th>Name</th>
                  <th>Descriptions</th>
                  <th>Price</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">
              </tbody>
            </table>
          </div>
          
        </div>
        <!--/ Basic Bootstrap Table -->
      </div>

      @push('scripts')
        <script type="text/javascript">
            $(function() {
                let OffersTable = $('#offers-table').DataTable({
                    scrollX: true,
                    serverSide: true,
                    processing: true,
                    ajax: "{{ route('admin.offers.data') }}",
                    columns: [
                        {data: 'id', name: 'id'},
                        {data: 'name', name: 'name'},
                        {data: 'description', name: 'description'},
                        {data: 'price', name: 'price'},
                        {data: 'status', name: 'status'},
                        {data: 'actions', name: 'actions', orderable: false, searchable: false},
                    ],
                    order: [[1, 'name']],
                    // drawCallback: function (settings) {}
                });
            });
        </script>
      @endpush

</x-layouts.back-end.application>