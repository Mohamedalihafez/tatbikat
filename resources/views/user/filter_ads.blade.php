
@if ($ads->count() > 0)
    @foreach ($ads as $ad)
        
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
                    <h1 class="text-[1.1rem] capitalize font-[700] text-[#000000]">{{ "EGP" . " " . $ad->price }}</h1>
                </div>
                <div class="mb-[0.5rem]">
                    <p class="text-[0.8rem] capitalize font-[400] text-[#000000]">{{ $ad->city->name . ", " . $ad->governorate->name }}</p>
                </div>
                <div>
                    <p class="text-[0.8rem] capitalize font-[400] text-[#000000]">{{ $ad->created_at->shortAbsoluteDiffForHumans() }}</p>
                </div>
            </div>
        </div>
        
    @endforeach
@else
    <p>You Don't Have Any Ads Here, Please Check Later.!</p>
@endif
