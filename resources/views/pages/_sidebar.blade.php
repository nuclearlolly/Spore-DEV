<ul class="text-center">
    <li class="sidebar-header"><i class="fas fa-star fa-shake-icon mr-2"></i>Alien of the month!</li>

    <li class="sidebar-section p-2">
        @if (isset($featured) && $featured)
            <div class="ML-card-one">
                <div class="ML-image">
                    <div class="ML-card-two">
                        <div class="ML-card-three">
                            <div class="mt-1">
                                <a href="{{ $featured->url }}">
                                    <div class="h5 mb-0">
                                        @if (!$featured->is_visible)
                                            <i class="fas fa-eye-slash"></i>
                                        @endif {{ $featured->fullName }}
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="small">
                            {!! $featured->displayOwner !!}
                        </div>
                    </div>
                    <img src="{{ $featured->image->thumbnailUrl }}" class="img-thumbnail" />
                </div>
            </div>
            <div class="sidebar-item"><a href="{{ $featured->url }}">Monthly Prompt</a></div>
        @else
            <p>There is no featured character.</p>
        @endif
    </li>
</ul>
<style>
    .sidebar-item {
        margin-top: 10px;
    }
</style>
