<form action="{{ route("admin.users.update", $username) }}" style="display: inline-block" method="post">
    @csrf
    @method("PATCH")

    <button type="submit" class="delete btn btn-success btn-sm">Update as Admin</button>
</form>