@extends('layouts.app')

@section('content')
  <header>
    <a href="{{ url('/collections/create') }}">Create</a>
  </header>

  <h1>Collections</h1>

  @if (count($collections) > 0)
    @foreach ($collections as $collection)
      <div>
        @if (count($collection->photos()->get()) > 0)
          <img src="/storage/sm-img/{{ $collection->photos()->first()->img }}" alt="">
        @endif
        
        <h3>{{ $collection->name }}</h3>
        <a href="{{ url('/collections', $collection->id) }}">View</a>
      </div>
    @endforeach
  @else
    <p>No collections found</p>
  @endif
@endsection