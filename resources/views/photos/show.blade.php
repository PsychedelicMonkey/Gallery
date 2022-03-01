@extends('layouts.app')

@section('content')
  <h1>Photo</h1>

  <img src="/storage/img/{{ $photo->img }}" alt="" style="width: 550px; margin: auto;">
@endsection