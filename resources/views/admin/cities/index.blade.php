

<x-layouts.back-end.application>

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Cities /</span> All Cities</h4>
    
        <!-- Basic Bootstrap Table -->
        <div class="card overflow-hidden">
          <h5 class="card-header mb-4">All Cities</h5>
          <div class="text-wrap">
            <table class="table" id="Cities-table" style="width: 100%">
              <thead>
                <tr>
                  <th>NUM</th>
                  <th>Name</th>
                  <th>Slug</th>
                  <th>Governorate</th>
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
                let CitiesTable = $('#Cities-table').DataTable({
                    scrollX: true,
                    serverSide: true,
                    processing: true,
                    ajax: "{{ route('admin.cities.data') }}",
                    columns: [
                        {data: 'id', name: 'id'},
                        {data: 'name', name: 'name'},
                        {data: 'slug', name: 'slug'},
                        {data: 'governorate', name: 'governorate'},
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