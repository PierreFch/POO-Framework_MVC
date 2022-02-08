<ul>
    @foreach($users as $user)
    <li><img src="{{ $user->avatar_url }}" alt="" width="100px" /> {{ $user->name }} ({{ $user->email }})</li>
    @endforeach
</ul>

<a href="{{ route }}"></a>
