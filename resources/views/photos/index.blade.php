@extends('layouts.app')

@section('content')
  <header>
    <a href="{{ url('/photos/create') }}">Create</a>
  </header>

  <h1>Photos</h1>

  @if (count($photos) > 0)
    <div class="gallery">
      @foreach ($photos as $photo)
        <img src="/storage/{{ $photo->img }}" alt="" style="width: 100%;">
        <a href="/photos/{{ $photo->id }}/edit">Edit</a>
      @endforeach
    </div>
  @else
    <p>No photos found</p>
  @endif
@endsection