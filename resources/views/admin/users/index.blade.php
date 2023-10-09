

<x-layouts.back-end.application>

    <div class="container-xxl flex-grow-1 container-p-y ">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">{{ __("admin.users") }} /</span> {{ __("admin.all users") }}</h4>
    
        <!-- Basic Bootstrap Table -->
        <div class="card overflow-hidden">
          <h5 class="card-header mb-4">{{ __("admin.all users") }}</h5>
          <div class="text-wrap">
            <table class="table" id="users-table" style="width: 100%">
              <thead>
                <tr>
                  <th>{{ __("admin.NUM") }}</th>
                  <th>{{ __("admin.Name") }}</th>
                  <th>{{ __("admin.Email") }}</th>
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
                let usersTable = $('#users-table').DataTable({
                    scrollX: true,
                    serverSide: true,
                    processing: true,
                    ajax: "{{ route('admin.users.data') }}",
                    columns: [
                        {data: 'id', name: 'id', width: "5rem"},
                        {data: 'name', name: 'name', width: "10rem"},
                        {data: 'email', name: 'email', width: "13rem"},
                        {data: 'actions', name: 'actions', orderable: false, searchable: false},
                    ],
                    // order: [[2, 'email']],
                    // drawCallback: function (settings) {}
                });
            });
        </script>
    @endpush

</x-layouts.back-end.application>

