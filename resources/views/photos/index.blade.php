@extends('layouts.app')

@section('content')
  @if (count($photos) > 0)
    @include('inc.gallery')
  @else
    <p>No photos found</p>
  @endif
@endsection