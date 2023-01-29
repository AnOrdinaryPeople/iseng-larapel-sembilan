<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ config('app.name') }}">

    <title>{{ config('app.name') }} - @yield('title', config('app.env'))</title>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
  </head>
  <body>
    <div class="container-fluid">
      @yield('content')
    </div>

    @yield('modal')
    @yield('script')
  </body>
</html>
