<nav class="navbar navbar-expand-md navbar-light">
    <ul class="navbar-nav ml-auto mr-auto">
        <li class="nav-item"><a href="{{ url('info/terms') }}" class="nav-link">Terms</a></li>
        <li class="nav-item" style="opacity:50%"><a class="nav-link spark">✦</a></li>
        <li class="nav-item"><a href="{{ url('info/privacy') }}" class="nav-link">Privacy</a></li>
        <li class="nav-item" style="opacity:50%"><a class="nav-link spark">✦</a></li>
        <li class="nav-item"><a href="https://github.com/lk-arpg/lorekeeper" class="nav-link">Lorekeeper</a></li>
        <li class="nav-item" style="opacity:50%"><a class="nav-link spark">✦</a></li>
        <li class="nav-item"><a href="{{ url('credits') }}" class="nav-link">Credits</a></li>
        <li class="nav-item" style="opacity:50%"><a class="nav-link spark">✦</a></li>
        <li class="nav-item"><a href="{{ url('credits') }}" class="nav-link"><i class="fas fa-home"></i> Toyhouse</a></li>
        <li class="nav-item" style="opacity:50%"><a class="nav-link spark">✦</a></li>
        <li class="nav-item"><a href="{{ url('credits') }}" class="nav-link"><i class="fab fa-discord"></i> Discord</a></li>
        <li class="nav-item" style="opacity:50%"><a class="nav-link spark">✦</a></li>
        <li class="nav-item"><a href="{{ url('credits') }}" class="nav-link"><i class="fas fa-coffee"></i> Ko-fi</a></li>
    </ul>
</nav>
<div class="copyright">&copy; {{ config('lorekeeper.settings.site_name', 'Lorekeeper') }} v{{ config('lorekeeper.settings.version') }} {{ Carbon\Carbon::now()->year }}</div>
