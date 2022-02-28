@extends('layouts.app')

@section('content')
  <header>
    <a href="{{ url('/photos/create') }}">Create</a>
  </header>

  <h1>Photos</h1>

  @if (count($photos) > 0)
    @include('inc.gallery')
  @else
    <p>No photos found</p>
  @endif
@endsection