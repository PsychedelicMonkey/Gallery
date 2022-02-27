@extends('layouts.app')

@section('content')
  <header>
    <a href="{{ url('/photos/create') }}">Create</a>
  </header>

  <h1>Photos</h1>

  @if (count($photos) > 0)
    <section class="gallery-container">
      <div class="gallery">
        <div class="gallery-sizer"></div>
        @foreach ($photos as $photo)
          <a href="/storage/img/{{ $photo->img }}" class="gallery-item">
            <img src="/storage/sm-img/{{ $photo->img }}" alt="">
          </a>
          {{-- <a href="/photos/{{ $photo->id }}/edit">Edit</a> --}}
        @endforeach
      </div>
    </section>
  @else
    <p>No photos found</p>
  @endif
@endsection