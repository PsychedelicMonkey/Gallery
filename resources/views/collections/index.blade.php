@extends('layouts.app')

@section('content')
  @if (count($collections) > 0)
    @foreach ($collections as $collection)
      <div>
        @if (count($collection->photos()->get()) > 0)
          <img src="/storage/img/thumb-{{ $collection->photos()->first()->img }}" alt="">
        @endif
        
        <h3>{{ $collection->name }}</h3>
        <a href="{{ url('/collections', $collection->id) }}">View</a>
      </div>
    @endforeach
  @else
    <p class="not-found">No collections found</p>
  @endif
@endsection