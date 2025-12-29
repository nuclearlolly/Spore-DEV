<ul>
    <li class="sidebar-header">Trade Center</li>
    <li class="sidebar-section">
        <div class="sidebar-section-header">Trade Listings</div>
        <div class="sidebar-item"><a href="{{ url('trades/listings') }}" class="{{ set_active('trades/listings') }}">Active Listings</a></div>
        <div class="sidebar-item"><a href="{{ url('trades/listings/expired') }}" class="{{ set_active('trades/listings/expired') }}">My Trade Listings</a></div>
        <div class="sidebar-item"><a href="{{ url('trades/listings/create') }}" class="{{ set_active('trades/listings/create') }}">New Listing</a></div>
        <div class="sidebar-section-header">Trade Queue</div>
        <div class="sidebar-item"><a href="{{ url('trades/open') }}">My Trades</a></div>
        <div class="sidebar-item"><a href="{{ url('trades/create') }}">New Trade</a></div>
        <div class="sidebar-item"><a href="{{ url('trades/proposal') }}" class="{{ set_active('trades/proposal') }}">Propose Trade</a></div>
    </li>
</ul>
