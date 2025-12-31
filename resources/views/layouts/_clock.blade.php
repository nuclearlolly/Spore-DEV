<div style="position: fixed; top: 55px; right: 100px; margin-right: 2em; display: flex; align-items: left; gap: 1em; text-align: left;">
    @if(Auth::check())
        <div class="money">
            @foreach(Auth::user()->getCurrencies(false)->where('id', 1) as $currency)
                <div class="ml-1" style="color: #ffffffff;">{!! $currency->display($currency->quantity) !!}</div>
            @endforeach
            @foreach(Auth::user()->getCurrencies(false)->where('id', 2) as $currency)
                <div class="ml-1" style="color: #ffffffff;">{!! $currency->display($currency->quantity) !!}</div>
            @endforeach
            @foreach(Auth::user()->getCurrencies(false)->where('id', 3) as $currency)
                <div class="ml-1" style="color: #ffffffff;">{!! $currency->display($currency->quantity) !!}</div>
            @endforeach
        </div>
        
    @endif
</div>

@if (config('lorekeeper.extensions.scroll_to_top'))
    @include('widgets/_scroll_to_top')
@endif