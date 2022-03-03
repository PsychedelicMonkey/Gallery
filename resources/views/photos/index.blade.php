@extends('layouts.app')

@section('content')
  <h1 class="title">Photos</h1>

  @if (count($photos) > 0)
    @include('inc.gallery')
  @else
    <h3 class="not-found">No photos found</h3>
  @endif
@endsection