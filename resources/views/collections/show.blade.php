@extends('layouts.app')

@section('content')
  <h1>{{ $collection->name }}</h1>
  <h4>{{ $collection->description }}</h4>
  <p>{{ $collection->location }}</p>

  @include('inc.gallery', ['photos' => $collection->photos()->paginate(20)])
@endsection