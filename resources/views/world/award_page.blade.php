@extends('world.layout')

@section('title')
    {{ $award->name }}
@endsection

@section('meta-img')
    {{ $imageUrl }}
@endsection

@section('meta-desc')
    @if (isset($award->category) && $award->category)
        <p><strong>Category:</strong> {{ $award->category->name }}</p>
    @endif
    @if (isset($award->rarity) && $award->rarity)
        :: <p><strong>Rarity:</strong> {{ $award->rarity->name }}</p>
    @endif
    :: {!! substr(str_replace('"', '&#39;', $award->description), 0, 69) !!}
@endsection

@section('content')

    {!! breadcrumbs(['World' => 'world', 'Awards' => 'world/awards', $award->name => $award->idUrl]) !!}

    @include('world._award_entry', ['award' => $award])

@endsection
