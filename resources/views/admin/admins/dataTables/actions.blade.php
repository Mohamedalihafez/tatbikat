
<form action="{{ route("admin.admins.update", $username) }}" style="display: inline-block" method="post">
    @csrf
    @method("PATCH")

    <button type="submit" class="delete btn btn-danger btn-sm">{{ __("admin.Delete from Admins") }}</button>
</form>