<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ mix('css/app.css') }}">
  <title>{{ config('app.name') }}</title>
</head>
<body>
  <header class="page-header">
    <div class="wrap">
      <a href="{{ url('/') }}" class="nav-logo">Logo</a>
  
      <div id="main-nav" class="main-nav">
        <button id="nav-close">&Cross;</button>

        <nav class="nav-links">
          <a href="{{ url('/') }}">Home</a>
          <a href="{{ url('/about') }}">About Me</a>
          <a href="{{ url('/photos') }}">Photos</a>
          <a href="{{ url('/collections') }}">Collections</a>
        </nav>
      </div>
  
      <button id="nav-button"><i class="fa-solid fa-bars"></i></button>
    </div>
  </header>

  <main id="main-content">
    @yield('content')
  </main>

  <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>