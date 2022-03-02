@extends('layouts.app')

@section('content')
  @if (count($photos) > 0)
    @include('inc.gallery')
  @else
    <h3 class="not-found">No photos found</h3>
  @endif
@endsection