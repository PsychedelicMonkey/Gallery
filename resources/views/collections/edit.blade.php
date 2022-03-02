@extends('layouts.app')

@section('content')
  <section class="container">
    <div class="form">
      <h1>Edit Collection</h1>
    
      <form action="/collections/{{ $collection->id }}" method="post">
        @csrf
        @method('PUT')
    
        <div class="form-input">
          <label for="name">Name</label>
          <input type="text" name="name" id="name" value="{{ $collection->name }}" @error('name')class="error"@enderror>

          @error('name')
            <div class="form-error">{{ $message }}</div>
          @enderror
        </div>
    
        <div class="form-input">
          <label for="description">Description</label>
          <textarea name="description" id="description" cols="30" rows="10" @error('description')class="error"@enderror>{{ $collection->description }}</textarea>

          @error('description')
            <div class="form-error">{{ $message }}</div>
          @enderror
        </div>
    
        <div class="form-input">
          <label for="location">Location</label>
          <input type="text" name="location" id="location" value="{{ $collection->location }}" @error('location')class="error"@enderror>

          @error('location')
            <div class="form-error">{{ $message }}</div>
          @enderror
        </div>
    
        <div class="form-input">
          <select name="photos[]" id="photos" multiple>
            <option value="#">Select Photos</option>
      
            @foreach ($photos as $photo)
                <option value="{{ $photo->id }}"@if($collection->photos->contains($photo->id))selected @endif>{{ $photo->id }}</option>
            @endforeach
          </select>
        </div>
    
        <button type="submit" class="btn">Save Collection</button>
      </form>
    
      <hr class="separator">
    
      <form action="/collections/{{ $collection->id }}" method="post">
        @csrf
        @method('DELETE')
    
        <button type="submit" class="btn-delete">Delete this Collection</button>
      </form>
    </div>
  </section>
@endsection