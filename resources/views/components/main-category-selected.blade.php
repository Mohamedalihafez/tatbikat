

<option class="font-[700]" disabled>{{ $mainCategory->name }}</option>
<div>
    @foreach ($mainCategory->subCategories as $subCategory)
        <option class="font-[300]" value="{{ $subCategory->id }}">{{ $subCategory->name }}</option>
    @endforeach
</div>