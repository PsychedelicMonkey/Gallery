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
          <a href="/storage/img/{{ $photo->img }}" class="gallery-item" data-width="{{ $photo->width }}" data-sub-html=".caption">
            <img src="/storage/sm-img/{{ $photo->img }}" alt="">

            <div class="caption" style="display: none;">
              <h4>{{ $photo->caption }}</h4>
              @if ($photo->location)<p>Location: <b>{{ $photo->location }}</b></p>@endif
            </div>
          </a>
          {{-- <a href="/photos/{{ $photo->id }}/edit">Edit</a> --}}
        @endforeach
      </div>
    </section>
  @else
    <p>No photos found</p>
  @endif
@endsection