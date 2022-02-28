@extends('layouts.app')

@section('content')
  <h1>Create Collection</h1>

  <form action="/collections" method="post">
    @csrf

    <div>
      <label for="name">Name</label>
      <input type="text" name="name" id="name">
    </div>

    <div>
      <label for="description">Description</label>
      <textarea name="description" id="description" cols="30" rows="10"></textarea>
    </div>

    <div>
      <label for="location">Location</label>
      <input type="text" name="location" id="location">
    </div>

    <button type="submit">Create Collection</button>
  </form>
@endsection