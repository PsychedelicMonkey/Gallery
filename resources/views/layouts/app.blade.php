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
  <header>
    <nav>
      <a href="{{ url('/') }}">Home</a>
      <a href="{{ url('/about') }}">About Us</a>
      <a href="{{ url('/photos') }}">Photos</a>
    </nav>
  </header>

  <main>
    @yield('content')
  </main>

  <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>