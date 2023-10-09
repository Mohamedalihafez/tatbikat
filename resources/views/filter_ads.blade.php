
@if ($ads->count())
    @foreach ($ads as $ad)
        <div class="recommendation-item">
        <div class="img">
            <img class="w-full h-full" src="{{ asset("upload_files/ads/" . $ad->thumbnail) }}" alt="{{ $ad->name }}" />
        </div>

        <div class="details">
            <a href="{{ route("posts.show", $ad->slug) }}">
            <h3 class="truncate">{{ $ad->name }}</h3>
            </a>
            <h2>{{ __("messages.egp") . " " . $ad->price }}</h2>
            <p class="mb-[0.7rem] capitalize">{{ $ad->city->name . ", " . $ad->governorate->name }}</p>
            <p class="capitalize">{{ $ad->created_at->diffForHumans() }}</p>
        </div>
        </div>
    @endforeach
@else
    <div class="flex justify-center items-center w-full">
        <p class="text-[0.9rem] text-[#000000] capitalize font-[500]">{{ __("messages.no result match value of search") }}</p>  
    </div>
@endif