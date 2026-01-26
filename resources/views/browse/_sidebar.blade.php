<ul>
    <li class="sidebar-header">Masterlist</li>
    <li class="sidebar-section">
        <div class="sidebar-item"><a href="{{ url('masterlist') }}" class="{{ set_active('masterlist*') }}">Characters</a></div>
        <div class="sidebar-item"><a href="{{ url('myos') }}" class="{{ set_active('myos*') }}">MYO Slots</a></div>
    </li>
    @if (isset($sublists) && $sublists->count() > 0)
        <div class="sidebar-section-header">Sub Masterlists</div>
        @foreach ($sublists as $sublist)
            <div class="sidebar-item"><a href="{{ url('sublist/' . $sublist->key) }}" class="{{ set_active('sublist/' . $sublist->key) }}">{{ $sublist->name }}</a></div>
        @endforeach
    @endif
</ul>
