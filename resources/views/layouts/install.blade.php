<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Trackiny | @yield('title')</title>
  <link rel="stylesheet" href="{{mix('css/main.css')}}">
</head>

<body>

  <div id="app">
    @yield('install')
    {{-- <div class="install">
      <div class="install_wrapper">
      </div>
    </div> --}}
  </div>

  <script defer src="{{ mix('js/main.js') }}"></script>

</body>

</html>