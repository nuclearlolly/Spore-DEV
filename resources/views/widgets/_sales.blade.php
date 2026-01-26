<div class="card mb-4">
    <div class="card-header">
        <h4 class="mb-0"><i class="fas fa-money-bill-wave"></i> Recent Sales</h4>
    </div>
    <div class="card-body text-center justify-content-center" style="max-width:262px; margin-left: 19px;">
        @if ($saleses->count())
            @foreach ($saleses as $sales)
                <div class="text-center">
                    @if ($sales->characters->count())
                        <div class="ML-card-one">
                            <div class="ML-image">
                                <div class="ML-card-two">
                                    <div class="ML-card-three">
                                        <div class="">
                                            <div class="h5"><a href=>{!! $sales->displayName !!}</a></div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <span class="ml-2 small">Posted {!! $sales->post_at ? pretty_date($sales->post_at) : pretty_date($sales->created_at) !!}</span>
                                    </div>
                                </div>
                                <a href="{{ $sales->url }}">
                                    <img src="{{ $sales->characters->first()->character->image->thumbnailUrl }}" alt="{!! $sales->characters->first()->character->fullName !!}" class="img-thumbnail" />
                                </a>
                            </div>
                    @endif
                    <div class="ML-card-four">
                        @if ($sales->characters->count())
                            <div class="h6">
                                <b>{!! $sales->characters->first()->price !!} ({{ $sales->characters->first()->displayType }})</b>
                                @if ($sales->characters->first()->description)
                                    <br>{!! $sales->characters->first()->description !!}
                                @endif
                                <br>
                            </div>
                            <b>Artist:</b>
                            @foreach ($sales->characters->first()->character->image->artists as $artist)
                                {!! $artist->displayLink() !!}
                            @endforeach
                            <br>
                            <b>Designer:</b>
                            @foreach ($sales->characters->first()->character->image->designers as $designer)
                                {!! $designer->displayLink() !!}
                            @endforeach
                    </div>
                @else
                    <p class="">{!! substr(strip_tags(str_replace('<br />', '&nbsp;', $sales->parsed_text)), 0, 300) !!}... <a href="{!! $sales->url !!}">View sale <i class="fas fa-arrow-right"></i></a></p>
            @endif
    </div>
    @endforeach
@else
    <div class="text-center">
        <h5 class="mb-0">There are no sales.</h5>
    </div>
    @endif
</div>
</div>
</div>
