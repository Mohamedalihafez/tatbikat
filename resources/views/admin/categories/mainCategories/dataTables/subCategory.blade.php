
@foreach ($mainCategory->subCategories as $subCategory)
    <h6>{{ $subCategory->name }}</h6>
@endforeach