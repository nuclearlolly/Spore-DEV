<ul>
    <li class="sidebar-header"><a href="{{ url('/') }}" class="card-link">Items</a></li>
    <li class="sidebar-section">
        <div class="sidebar-item"><a href="{{ url('world/item-categories') }}" class="{{ set_active('world/item-categories*') }}">Item Categories</a></div>
        <div class="sidebar-item"><a href="{{ url('world/items') }}" class="{{ set_active('world/items*') }}">All Items</a></div>
        <div class="sidebar-item"><a href="{{ url('world/currency-categories') }}" class="{{ set_active('world/currency-categories*') }}">Currency Categories</a></div>
        <div class="sidebar-item"><a href="{{ url('world/item-index') }}" class="{{ set_active('world/item-index*') }}">Item Index</a></div>
        <div class="sidebar-item"><a href="{{ url('world/currencies') }}" class="{{ set_active('world/currencies*') }}">All Currencies</a></div>
        <div class="sidebar-section-header">Recipes</div>
        <div class="sidebar-item"><a href="{{ url('world/recipes') }}" class="{{ set_active('world/recipes*') }}">All Recipes</a></div>
    </li>
</ul>
