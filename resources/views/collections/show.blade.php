@extends('layouts.app')

@section('content')
  <header class="collection-header">
    <h1 class="name">{{ $collection->name }}</h1>
    @if ($collection->description)<h4 class="description">{{ $collection->description }}</h4>@endif
    @if ($collection->location)<p class="location"><b>Location:</b> {{ $collection->location }}</p>@endif
    <p class="count">{{ count($collection->photos()->get()) }} photos</p>
  </header>

  @include('inc.gallery', ['photos' => $collection->photos()->paginate(20)])
@endsection