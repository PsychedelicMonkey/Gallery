@extends('layouts.app')

@section('content')
  <section class="container">
    <div class="form">
      <h1>Create New Photo</h1>
      
      <form action="/photos" method="post" enctype="multipart/form-data">
        @csrf
    
        <div class="form-input">
          <input type="file" name="img" id="img">
        </div>
    
        <div class="form-input">
          <label for="caption">Caption</label>
          <input type="text" name="caption" id="caption">
        </div>
    
        <div class="form-input">
          <label for="location">Location</label>
          <input type="text" name="location" id="location">
        </div>
    
        <button type="submit" class="btn">Save</button>
      </form>
    </div>
  </section>
@endsection