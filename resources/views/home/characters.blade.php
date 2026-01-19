@extends('home.layout')

@section('home-title')
    My Characters
@endsection

@section('home-content')
    {!! breadcrumbs(['My Characters' => 'characters']) !!}

    <h1>
        My Characters
    </h1>

    <p>This is a list of characters you own. Drag and drop to rearrange them.</p>

    <div id="sortable" class="row sortable">
        @foreach ($characters as $character)
            <div class="col-md-3 col-6 text-center mb-2" data-id="{{ $character->id }}">
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
    {!! Form::open(['url' => 'characters/sort', 'class' => 'text-right']) !!}
    {!! Form::hidden('sort', null, ['id' => 'sortableOrder']) !!}
    {!! Form::submit('Save Order', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}

    <div class="mobile-handle handle-clone badge badge-primary rounded-circle hide">
        <i class="fas fa-hand-point-up" aria-hidden="true"></i>
        <span class="sr-only">Drag Handle</span>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $("#sortable").sortable({
                characters: '.sort-item',
                placeholder: "sortable-placeholder col-md-3 col-6",
                stop: function(event, ui) {
                    $('#sortableOrder').val($(this).sortable("toArray", {
                        attribute: "data-id"
                    }));
                },
                create: function() {
                    $('#sortableOrder').val($(this).sortable("toArray", {
                        attribute: "data-id"
                    }));
                }
            });
            $("#sortable").disableSelection();

            function isTouch() {
                try {
                    document.createEvent("TouchEvent");
                    return true;
                } catch (e) {
                    return false;
                }
            }

            if (isTouch()) {
                $('#sortable').children().each(function() {
                    var $clone = $('.handle-clone').clone();
                    $(this).append($clone);
                    $clone.removeClass('hide handle-clone');
                });
                $("#sortable").sortable("option", "handle", ".mobile-handle");
            }
        });
    </script>
@endsection
