<form action="{{ route('logout') }}" method="POST" style="text-align: center;">
    @csrf
    <button type="submit" style="background: red; color: white; padding: 8px 12px; border: none; cursor: pointer;">Logout</button>
</form>
