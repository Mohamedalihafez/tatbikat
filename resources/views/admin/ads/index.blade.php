
<x-layouts.back-end.application>

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">{{ __("admin.ads") }} /</span> {{ __("admin.all ads") }}</h4>
    
        <!-- Basic Bootstrap Table -->
        <div class="card overflow-hidden">
          <h5 class="card-header mb-4">{{ __("admin.all ads") }}</h5>
          <div class="text-wrap">
            <table class="table" id="ads-table" style="width: 100%">
              <thead>
                <tr>
                  <th>{{ __("admin.NUM") }}</th>
                  <th>{{ __("admin.Name") }}</th>
                  <th>{{ __("admin.Slug") }}</th>
                  <th>{{ __("admin.accept_ads") }}</th>
                  <th>{{ __("admin.certification") }}</th>
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
                let adsTable = $('#ads-table').DataTable({
                    scrollX: true,
                    serverSide: true,
                    processing: true,
                    ajax: "{{ route('admin.ads.data') }}",
                    columns: [
                      {data: 'id', name: 'id'},
                        {data: 'name', name: 'name'},
                        {data: 'slug', name: 'slug'},
                        {"data": "status",
                        render: function(data, type, row, meta) {
                          if(data =='active' ){
                            $html = `<label class="switch">  <input class="ads_status" type="checkbox" name="status" checked >   <span class="slider round"></span></label>`;
                            return $html;
                          }
                          else {
                            $html = `<label class="switch">  <input  class="ads_status" type="checkbox" name="status" >   <span class="slider round"></span></label>`;
                            return $html;
                          }
                        }
                },
                        {data: 'certification', name: 'certification'},
                        {data: 'actions', name: 'actions', orderable: false, searchable: false},
                    ],
                    
                    order: [[1, 'name']],
                    // drawCallback: function (settings) {}
                });
                
            });

        </script>
          <script>
        setTimeout(() => {
          $(".ads_status").on("change", function(){   
           id =$(this).parent().parent().parent().children().eq(0).text();
            if ($(this).is(":checked"))
            {
              x =  $(this).val('active');
              x = 'active'
              
            }   
            else {
              x =  $(this).val('inactive');
              x = 'inactive'
            }

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                },
                url: '{{ route("ads.fetch") }}',
                method: 'post',
                data:{"status": x , "id" :id } ,
                success: function (results) {
                  Swal.fire({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    icon: 'success',
                    title: "{{ __('admin.sucessdata') }}"
                });
                },
            });
        });
          
        }, 2000);
          
          if ($('.user_status').val() == 0)
          {
              $(".user_status").prop('checked', true);
          } 
          else{
              $(".user_status").prop('checked', false);
          }
          </script>
      @endpush

    
</x-layouts.back-end.application>