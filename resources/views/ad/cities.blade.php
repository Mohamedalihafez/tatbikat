
<option selected disabled>
    {{ __("post.Choosing City") . " ..." }}
</option>
@foreach ($cities as $city)
    <option value="{{ $city->id }}">
        <span>{{ $city->translate()->name }}</span>
    </option>
@endforeach