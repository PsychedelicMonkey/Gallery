@extends('layouts.app')

@section('content')
  <h1>Collections</h1>

  @if (count($collections) > 0)
    @foreach ($collections as $collection)
      <div>
        <img src="/storage/sm-img/{{ $collection->photos()->first()->img }}" alt="">
        <h3>{{ $collection->name }}</h3>
        <a href="{{ url('/collections', $collection->id) }}">View</a>
      </div>
    @endforeach
  @else
    <p>No collections found</p>
  @endif
@endsection