@extends('layouts.app')

@section('content')
  <h1>Edit Photo</h1>

  <form action="/photos/{{ $photo->id }}" method="post">
    @csrf
    @method('PUT')

    <img src="/storage/img/sm-{{ $photo->img }}" alt="" style="width: auto; height: auto;">

    <div>
      <label for="caption">Caption</label>
      <input type="text" name="caption" id="caption" value="{{ $photo->caption }}">
    </div>

    <div>
      <label for="location">Location</label>
      <input type="text" name="location" id="location" value="{{ $photo->location }}">
    </div>

    <button type="submit">Save</button>
  </form>

  <hr>

  <form action="/photos/{{ $photo->id }}" method="post">
    @csrf
    @method('DELETE')

    <button type="submit">Delete</button>
  </form>
@endsection