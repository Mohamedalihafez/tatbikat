

<x-layouts.back-end.application>

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Transactions /</span> All Transactions</h4>
    
        @if (session('status'))
          <div class="mb-4 mt-4 font-medium text-sm text-green-600">
              {{ session('status') }}
          </div>
        @endif
        <!-- Basic Bootstrap Table -->
        <div class="card overflow-hidden">
          <h5 class="card-header mb-4">All Transactions</h5>
          <div class="text-wrap">
            <table class="table" id="transactions-table" style="width: 100%">
              <thead>
                <tr>
                  <th>NUM</th>
                  {{-- <th>UserId</th> --}}
                  <th>UserName</th>
                  <th>Message</th>
                  <th>transfer number</th>
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
                let transactionsTable = $('#transactions-table').DataTable({
                    scrollX: true,
                    serverSide: true,
                    processing: true,
                    ajax: "{{ route('admin.transactions.data') }}",
                    columns: [
                        {data: 'id', name: 'id'},
                        // {data: 'user_id', name: 'user_id'},
                        {data: 'user_name', name: 'user_name'},
                        {data: 'message', name: 'message'},
                        {data: 'converter_number', name: 'converter_number'},
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