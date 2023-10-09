

<x-layouts.back-end.application>

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">{{ __("admin.admins") }} /</span> {{ __("admin.all admins") }}</h4>
  
      <!-- Basic Bootstrap Table -->
      <div class="card overflow-hidden">
        <h5 class="card-header mb-4">{{ __("admin.all admins") }}</h5>
        <div class="text-wrap">
          <table class="table" id="admins-table" style="width: 100%">
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
              let usersTable = $('#admins-table').DataTable({
                  scrollX: true,
                  serverSide: true,
                  processing: true,
                  ajax: "{{ route('admin.admins.data') }}",
                  columns: [
                      {data: 'id', name: 'id'},
                      {data: 'name', name: 'name'},
                      {data: 'email', name: 'email'},
                      {data: 'actions', name: 'actions', orderable: false, searchable: false},
                  ],
                  order: [[1, 'name']],
                  // drawCallback: function (settings) {}
              });
          });
      </script>
    @endpush

</x-layouts.back-end.application>