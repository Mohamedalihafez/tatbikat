

<x-layouts.back-end.application>

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> </span> {{ __("admin.main category") }}</h4>
    
        <!-- Basic Bootstrap Table -->
        <div class="card overflow-hidden">
          <h5 class="card-header mb-4">{{ __("admin.main category") }}</h5>
          <div class="text-wrap">
            <table class="table" id="main-category-table" style="width: 100%">
              <thead>
                <tr>
                  <th>{{ __("admin.NUM") }}</th>
                  <th>{{ __("admin.Name") }}</th>
                  <th>{{ __("admin.Slug") }}</th>
                  <th>{{ __("admin.sub category") }}</th>
                  <th>{{ __("admin.Status") }}</th>
                  <th>{{ __("admin.Actions") }}</th>
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
                let usersTable = $('#main-category-table').DataTable({
                    scrollX: true,
                    serverSide: true,
                    processing: true,
                    ajax: "{{ route('admin.categories.data') }}",
                    columns: [
                        {data: 'id', name: 'id'},
                        {data: 'name', name: 'name'},
                        {data: 'slug', name: 'slug'},
                        {data: 'sub_categories', name: 'sub_categories'},
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