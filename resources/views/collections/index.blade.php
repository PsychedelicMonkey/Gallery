@extends('layouts.app')

@section('content')
  <h1 class="title">Collections</h1>

  @if (count($collections) > 0)
    <div class="collection-container">
      <div class="collection-grid">
        @foreach ($collections as $collection)
          @if (count($collection->photos()->get()) > 0)
            <div class="collection-grid-link">
              <img src="/storage/img/thumb-{{ $collection->photos()->first()->img }}" alt="">
              <div class="content">
                <h3>{{ $collection->name }}</h3>
                <a href="{{ url('/collections', $collection->id) }}" class="btn-white-invert">View</a>
              </div>
            </div>
          @endif
        @endforeach
      </div>
    </div>
  @else
    <p class="not-found">No collections found</p>
  @endif
@endsection