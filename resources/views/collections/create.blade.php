@extends('layouts.app')

@section('content')
  <section class="container">
    <div class="form">
      <h1>Create Collection</h1>
    
      <form action="/collections" method="post">
        @csrf
    
        <div class="form-input">
          <label for="name">Name</label>
          <input type="text" name="name" id="name" @error('name')class="error"@enderror>

          @error('name')
            <div class="form-error">{{ $message }}</div>
          @enderror
        </div>
    
        <div class="form-input">
          <label for="description">Description</label>
          <textarea name="description" id="description" cols="30" rows="10" @error('description')class="error"@enderror></textarea>

          @error('description')
            <div class="form-error">{{ $message }}</div>
          @enderror
        </div>
    
        <div class="form-input">
          <label for="location">Location</label>
          <input type="text" name="location" id="location" @error('location')class="error"@enderror>

          @error('location')
            <div class="form-error">{{ $message }}</div>
          @enderror
        </div>
    
        <button type="submit" class="btn">Create Collection</button>
      </form>
    </div>
  </section>
@endsection