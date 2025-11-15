@extends('world.layout')

@section('world-title')
    Item Index
@endsection

@section('content')
    {!! breadcrumbs(['World' => 'world', 'Items' => 'world/items', 'Visual Index' => '#']) !!}
    <h1>Item Index</h1>

    <div>
        {!! Form::open(['method' => 'GET', 'class' => '']) !!}
        <div class="form-inline justify-content-end">
            <div class="form-group ml-3 mb-3">
                {!! Form::text('name', Request::get('name'), ['class' => 'form-control', 'placeholder' => 'Name']) !!}
            </div>
            <div class="form-group ml-3 mb-3">
                {!! Form::select('item_category_id', $categoriesForSearch, Request::get('item_category_id'), ['class' => 'form-control']) !!}
            </div>
            @if (config('lorekeeper.extensions.item_entry_expansion.extra_fields'))
                <div class="form-group ml-3 mb-3">
                    {!! Form::select('artist', $artists, Request::get('artist'), ['class' => 'form-control']) !!}
                </div>
            @endif
            <div class="form-group ml-3 mb-3">
                {!! Form::submit('Search', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    <div class="text-right mb-3">
        <div class="btn-group">
            <a href="#" class="btn btn-secondary active"><i class="fas fa-th"></i></a>
            <a href="/world/items" class="btn btn-secondary"><i class="fas fa-bars"></i></a>
        </div>
    </div>

    @if (!isset($items) || count($items) < 1)
    <div class="text-center">
        <i>No search results found.</i>
    </div>
    @endif

    @foreach ($items as $categoryId => $categoryItems)
        @if (!isset($categories[$categoryId]) || (Auth::check() && Auth::user()->hasPower('edit_data')) || $categories[$categoryId]->is_visible)
            <div class="card mb-3 inventory-category">
                <h5 class="card-header inventory-header">
                    @if (isset($categories[$categoryId]) && !$categories[$categoryId]->is_visible)
                        <i class="fas fa-eye-slash mr-1"></i>
                    @endif
                    {!! isset($categories[$categoryId]) ? '<a href="' . $categories[$categoryId]->searchUrl . '">' . $categories[$categoryId]->name . '</a>' : 'Miscellaneous' !!}
                </h5>
                <div class="card-body inventory-body">
                    @foreach ($categoryItems->chunk(4) as $chunk)
                        <div class="row mb-3">
                            @foreach ($chunk as $itemId => $item)
                                <div class="col-md-3 col-6 text-center align-self-center inventory-item">
                                    @if ($item->first()->has_image)
                                        <a class="badge" style="border-radius:.5em; }}" href="{{ $item->first()->url }}">
                                            <img class="my-1 modal-image" style="max-height:150px; border-radius:.5em;" src="{{ $item->first()->imageUrl }}" alt="{{ $item->first()->name }}" data-id="{{ $item->first()->id }}"  width="100px"/>
                                        </a>
                                    @endif
                                    <p>
                                        @if ( !empty($item->first()->data['is_visible']))
                                            <i class="fas fa-eye-slash mr-1"></i>
                                        @endif
                                        {!! $item->first()->displayName !!}
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    @endforeach
@endsection

@section('scripts')
        <script>
            $(document).ready(function() {
                $('.modal-image').on('click', function(e) {
                    e.preventDefault();
                    loadModal("{{ url('world/item-index') }}/" + $(this).data('id'), 'Item Detail');
                });
            })
        </script>
@endsection
