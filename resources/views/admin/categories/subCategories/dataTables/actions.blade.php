<a href="{{ route("admin.subCategories.edit", $slug) }}" class="edit btn btn-success btn-sm">{{ __("admin.Edit") }}</a>
<form action="{{ route("admin.subCategories.destroy", $slug) }}" style="display: inline-block" method="post">
    @csrf
    @method("DELETE")

    <button type="submit" class="delete btn btn-danger btn-sm">{{ __("admin.Delete") }}</button>
</form>