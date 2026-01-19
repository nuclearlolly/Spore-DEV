@extends('home.layout')

@section('home-title')
    My Characters
@endsection

@section('home-content')
    {!! breadcrumbs(['My Characters' => 'characters']) !!}

    <h1>
        My Characters
    </h1>

<div class="text-right mb-2">
    <a class="btn btn-primary create-folder mx-1" href="#"><i class="fas fa-plus"></i> Create New Folder</a>
    <a class="btn btn-primary edit-folder mx-1" href="#"><i class="fas fa-edit"></i> Edit Folder</a>
</div>

<div id="folders" class="collapse text-right">
    <div class="row">
        <div class="col-8">
        </div>
        <div class="form-group col-4">
            {!! Form::label('Select Folder to Edit') !!}
            {!! Form::select('folder_ids[]', $folders, null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="edit-get-button btn btn-primary"><i class="fas fa-edit"></i> Edit Folder</a></div>
</div>

<p>This is a list of characters you own. Drag and drop to rearrange them.</p>

{!! Form::open(['url' => 'characters/sort', 'class' => 'text-right']) !!}
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
            <div class="form-group">
                {!! Form::label('folder_ids[]', 'Folder (Optional)') !!}
                {!! Form::select('folder_ids[]', $folders, $character->folder_id, ['class' => 'form-control']) !!}
            </div>
        </div>

    @endforeach
</div>

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
        $( document ).ready(function() {
            
            $('.create-folder').click(function(e){
                e.preventDefault();
                loadModal("{{ url('/characters/folder/create') }}", "Create New Folder");
            });

            $('.edit-folder').click(function(e){
                e.preventDefault();
                $('#folders').collapse('toggle');
            });

            $('.edit-get-button').click(function(e){
                e.preventDefault();
                var folder_id = $('#folders select').val();
                var url = "{{ url('/characters/folder/edit') }}/" + folder_id;
                loadModal(url, "Edit Folder");
            });

            $( "#sortable" ).sortable({
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
