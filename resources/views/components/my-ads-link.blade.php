@props(['ads_count'])

<div {{ $attributes->merge(["class" => App::getLocale() === "ar" ? "ml-[0.5rem]" : "mr-[0.5rem]"]) }}>
    <a href="" class="border-[0.1rem] border-slate-600 px-[0.5rem] py-[0.8rem] rounded-[0.2rem] flex items-center">
        <span class="capitalize text-[0.9rem] font-[600] {{ App::getLocale() === "ar" ? "ml-[0.5rem]" : "mr-[0.5rem]" }}">{{ $slot }}</span>
        <span class="text-[0.8rem] font-[500]">({{ $ads_count }})</span>
    </a>
</div>