

<x-layouts.front-end.application>

    <section class="min-h-[100vh] px-[3rem]">
        <div class="flex items-center my-[1rem]">
            <h2 class="mr-[0.5rem] text-[0.9rem] p-[0.5rem] uppercase text-[#000000] font-[500]">
                <a href="{{ route("users.my-ads") }}">ads</a>
            </h2>
            <h2 class="text-[0.9rem] p-[0.5rem] uppercase font-[500] text-[#000000] border-b-[0.2rem] border-black">
                <a href="{{ route("users.favorites") }}">favorites</a>
            </h2>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 my-[1.5rem]">
            @foreach ($favorite_ads as $ad)
                <div class="border-[1px] border-slate-500 rounded-[3px]">
                    <div class="w-full h-[10rem] bg-slate-400">
                        <img class="w-full h-full object-cover" src="{{ asset("upload_files/ads/" . $ad->thumbnail) }}" alt="{{ $ad->name }}">
                    </div>

                    <div class="p-[1rem]">
                        <div class="my-[0.5rem]">
                            <a href="{{ route("posts.show", $ad->slug) }}">
                                <h1 class="text-[0.9rem] capitalize font-[500] text-[#000000]">{{ $ad->name }}</h1>
                            </a>
                        </div>
                        <div class="mb-[1.5rem]">
                            <h1 class="text-[1.1rem] capitalize font-[700] text-[#000000]">{{ __("my_ads.egp") . " " . $ad->price }}</h1>
                        </div>
                        <div class="mb-[0.5rem]">
                            <p class="text-[0.8rem] capitalize font-[400] text-[#000000]">{{ $ad->city->name . ", " . $ad->governorate->name }}</p>
                        </div>
                        <div>
                            <p class="text-[0.8rem] capitalize font-[400] text-[#000000]">{{ $ad->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

</x-layouts.front-end.application>