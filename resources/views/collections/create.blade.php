@extends('layouts.app')

@section('content')
  <section class="container">
    <div class="form">
      <h1>Create Collection</h1>
    
      <form action="/collections" method="post">
        @csrf
    
        <div class="form-input">
          <label for="name">Name</label>
          <input type="text" name="name" id="name">
        </div>
    
        <div class="form-input">
          <label for="description">Description</label>
          <textarea name="description" id="description" cols="30" rows="10"></textarea>
        </div>
    
        <div class="form-input">
          <label for="location">Location</label>
          <input type="text" name="location" id="location">
        </div>
    
        <button type="submit" class="btn">Create Collection</button>
      </form>
    </div>
  </section>
@endsection