@extends('layouts.app')

@section('content')
  <h1>Create New Photo</h1>

  <form action="/photos" method="post" enctype="multipart/form-data">
    @csrf

    <div>
      <input type="file" name="img" id="img">
    </div>

    <div>
      <label for="caption">Caption</label>
      <input type="text" name="caption" id="caption">
    </div>

    <div>
      <label for="location">Location</label>
      <input type="text" name="location" id="location">
    </div>

    <button type="submit">Save</button>
  </form>
@endsection