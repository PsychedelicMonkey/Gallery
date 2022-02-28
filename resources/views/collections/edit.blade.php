@extends('layouts.app')

@section('content')
  <h1>Edit Collection</h1>

  <form action="/collections/{{ $collection->id }}" method="post">
    @csrf
    @method('PUT')

    <div>
      <label for="name">Name</label>
      <input type="text" name="name" id="name" value="{{ $collection->name }}">
    </div>

    <div>
      <label for="description">Description</label>
      <textarea name="description" id="description" cols="30" rows="10">{{ $collection->description }}</textarea>
    </div>

    <div>
      <label for="location">Location</label>
      <input type="text" name="location" id="location" value="{{ $collection->location }}">
    </div>

    <div>
      <select name="photos[]" id="photos" multiple>
        <option value="#">Select Photos</option>
  
        @foreach ($photos as $photo)
            <option value="{{ $photo->id }}"@if($collection->photos->contains($photo->id))selected @endif>{{ $photo->id }}</option>
        @endforeach
      </select>
    </div>

    <button type="submit">Save Collection</button>
  </form>

  <hr>

  <form action="/collections/{{ $collection->id }}" method="post">
    @csrf
    @method('DELETE')

    <button type="submit">Delete this Collection</button>
  </form>
@endsection