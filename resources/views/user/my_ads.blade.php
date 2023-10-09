

<x-layouts.front-end.application>

    <section class="container m-auto min-h-[100vh] px-[3rem]">
        <div class="flex items-center my-[1rem]">
            <h2 class="mr-[0.5rem] text-[0.9rem] p-[0.5rem] uppercase text-[#000000] font-[500] border-b-[0.2rem] border-black">
                <a href="{{ route("users.my-ads") }}">{{ __("my_ads.ads") }}</a>
            </h2>
            <h2 class="text-[0.9rem] p-[0.5rem] uppercase font-[500] text-[#000000]">
                <a href="{{ route("users.favorites") }}">{{ __("my_ads.favorites") }}</a>
            </h2>
        </div>

        <div class="flex flex-col lg:flex-row justify-between items-center">
            <div class="mb-[0.5rem] lg:mb-[0]">
                <div class="w-[17rem] md:w-[25rem] sm:w-[20rem] flex items-center bg-white border-[0.1rem] border-slate-400 px-[0.5rem]">
                    <i class="bx bx-search text-[1.5rem]"></i>
                    <input type="text" id="search" class="border-0 outline-none w-full" placeholder="{{ __("my_ads.search by ad title or id") }}">
                </div>
            </div>

            <div class="">
                <select id="category" class="w-[17rem] md:w-[25rem] sm:w-[20rem]">
                    <option selected disabled>
                        {{ __("my_ads.filter by category") }}
                    </option>
                    
                    @foreach (App\Models\MainCategory::where("status", "active")->get() as $mainCategory)
                        <x-main-category-selected :main_category='$mainCategory' />
                    @endforeach
                </select>
            </div>
        </div>

        <div class="my-[1rem] flex items-center flex-wrap lg:flex-nowrap gap-2" id="links">
            <x-my-ads-link class="my_ads_link" :ads_count='$ads_count' data-val="{{ Auth::user()->id }}">
                {{ __("my_ads.view all") }}
            </x-my-ads-link>

            <x-my-ads-link class="my_ads_link" :ads_count='$ads_active_count' data-val="active">
                {{ __("my_ads.active ads") }}
            </x-my-ads-link>

            <x-my-ads-link class="my_ads_link" :ads_count='$ads_inactive_count' data-val="inactive">
                {{ __("my_ads.inactive ads") }}
            </x-my-ads-link>

            <x-my-ads-link class="my_ads_link" :ads_count='$ads_pending_count' data-val="pending">
                {{ __("my_ads.pending ads") }}
            </x-my-ads-link>

            <x-my-ads-link class="my_ads_link" :ads_count='$ads_moderated_count' data-val="moderated">
                {{ __("my_ads.moderated ads") }}
            </x-my-ads-link>
        </div>

        <div class="grid lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-4 my-[1.5rem]" id="my_ads">
            @foreach ($ads as $ad)
                <x-ad-card :ad='$ad' class="border-[1px] border-slate-500 rounded-[0.5rem] overflow-hidden" />
            @endforeach
        </div>
    </section>

    @push('scripts')
        <script>
            $(document).on("click", ".my_ads_link", function (e) {
                e.preventDefault();
                let data = $(this).attr("data-val");
                

                if (data === "{{ Auth::user()->id }}") {

                    $.ajax({
                        type: "GET", 
                        url: '{{ route("users.my_ads.filter") }}',
                        data: {
                            "user_id": data
                        },
                        cache: false,

                        success: function (response) {
                            $("#my_ads").html(response);
                        }
                    });

                } else {

                    $.ajax({
                        type: "GET", 
                        url: '{{ route("users.my_ads.filter") }}',
                        data: {
                            "status": data
                        },
                        cache: false,

                        success: function (response) {
                            $("#my_ads").html(response);
                        }
                    });
                }
            });

            $(document).on("keyup", "#search", function (e) {

                let data = $(this).val();

                $.ajax({
                    type: "GET", 
                    url: '{{ route("users.my_ads.filter") }}',
                    data: {
                        "search": data
                    },
                    cache: false,

                    success: function (response) {
                        $("#my_ads").html(response);
                    }
                });

            });

            $(document).on("change", "#category", function (e) {

                let data = $(this).find(":selected").val();

                $.ajax({
                    type: "GET", 
                    url: '{{ route("users.my_ads.filter") }}',
                    data: {
                        "category": data
                    },
                    cache: false,

                    success: function (response) {
                        $("#my_ads").html(response);
                    }
                });

            });
        </script>
    @endpush

</x-layouts.front-end.application>