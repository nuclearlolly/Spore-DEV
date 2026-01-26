@if ($characters->count())
    <div class="row">
        @foreach ($characters as $character)
            <div class="col-md-3 col-6 text-center mb-2">
                <div class="ML-card-one">
                    <div class="ML-image">
                        <div class="ML-card-two">
                            <div class="ML-card-three">
                                <div class="mt-1">
                                    <a href="{{ $character->url }}" class="h5 mb-0">
                                        @if (!$character->is_visible)
                                            <i class="fas fa-eye-slash"></i>
                                        @endif {!! $character->warnings !!} {{ Illuminate\Support\Str::limit($character->fullName, 20, $end = '...') }}
                                    </a>
                                </div>
                            </div>
                            <div class="mt-1">
                                {!! $character->displayOwner !!}
                                @if (count($character->image->content_warnings ?? []) && (!Auth::check() || (Auth::check() && Auth::user()->settings->content_warning_visibility < 2)))
                                    <p class="mb-0"><span class="text-danger mr-1"><strong>Character Warning:</strong></span> {{ implode(', ', $character->image->content_warnings) }}</p>
                                @endif
                            </div>
                        </div>
                        <a href="{{ $character->url }}">
                            <img src="{{ $character->image->thumbnailUrl }}" class="img-thumbnail {{ $character->image->showContentWarnings(Auth::user() ?? null) ? 'content-warning' : '' }}" alt="Thumbnail for {{ $character->fullName }}" />
                        </a>
                    </div>
                    <div class="ML-card-four">
                        {!! $character->image->species_id ? $character->image->species->displayName : 'No Species' !!} ・ {!! $character->image->rarity_id ? $character->image->rarity->displayName : 'No Rarity' !!}
                        @if (count($character->image->content_warnings ?? []) && (!Auth::check() || (Auth::check() && Auth::user()->settings->content_warning_visibility < 2)))
                            <p class="mb-0"><span class="text-danger mr-1"><strong>Character Warning:</strong></span> {{ implode(', ', $character->image->content_warnings) }}</p>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@else
    <p>No {{ $myo ? 'MYO slots' : 'characters' }} found.</p>
@endif
