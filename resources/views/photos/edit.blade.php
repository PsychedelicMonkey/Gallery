@extends('layouts.app')

@section('content')
  <section class="container">
    <div class="form">
      <h1>Edit Photo</h1>
    
      <form action="/photos/{{ $photo->id }}" method="post">
        @csrf
        @method('PUT')
    
        <img src="/storage/img/sm-{{ $photo->img }}" alt="">
    
        <div class="form-input">
          <label for="caption">Caption</label>
          <input type="text" name="caption" id="caption" value="{{ $photo->caption }}" @error('caption')class="error"@enderror>

          @error('caption')
            <div class="form-error">{{ $message }}</div>
          @enderror
        </div>
    
        <div class="form-input">
          <label for="location">Location</label>
          <input type="text" name="location" id="location" value="{{ $photo->location }}" @error('caption')class="error"@enderror>

          @error('location')
            <div class="form-error">{{ $message }}</div>
          @enderror
        </div>
    
        <button type="submit" class="btn">Save</button>
      </form>
    
      <hr class="separator">
    
      <form action="/photos/{{ $photo->id }}" method="post">
        @csrf
        @method('DELETE')
    
        <button type="submit" class="btn-delete">Delete</button>
      </form>
    </div>
  </section>
@endsection