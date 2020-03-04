<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Trakiny</title>

  <style>
    @font-face {
      font-family: 'Josefin Sans';
      font-style: normal;
      font-weight: 400;
      font-display: swap;
      src: url('./fonts/JosefinSans-Regular.woff') format('woff'),
        /* Modern Browsers */
        url('./fonts/JosefinSans-Regular.ttf') format('truetype'),
        /* Safari, Android, iOS */
    }

    @font-face {
      font-family: 'Josefin Sans';
      font-style: normal;
      font-weight: 600;
      font-display: swap;
      src: url('./fonts/JosefinSans-SemiBold.woff') format('woff'),
        /* Modern Browsers */
        url('./fonts/JosefinSans-SemiBold.ttf') format('truetype'),
        /* Safari, Android, iOS */
    }

    @font-face {
      font-family: 'Josefin Sans';
      font-style: normal;
      font-weight: 700;
      font-display: swap;
      src: url('./fonts/JosefinSans-Bold.woff') format('woff'),
        /* Modern Browsers */
        url('./fonts/JosefinSans-Bold.ttf') format('truetype'),
        /* Safari, Android, iOS */
    }

    .glider-contain {
      width: 90%;
      max-width: 997px;
      margin: 0 auto;
    }
  </style>
  {{-- CSS --}}
  <link rel="stylesheet" href=" {{ mix('css/main.css')}}">

  @yield('plugins')
</head>

<body>

  @yield('main')


  <footer class="mt-16">

    <div class="w-32 m-auto">
      <img class="w-full" src="./images/logo.png" alt="trackiny logo">
    </div>


    <ul class="flex justify-center mt-4">
      <li><a class="link text-main " href="#">Home</a></li>
      <li><a class="link text-main " href="#">Features</a></li>
      <li><a class="link text-main " href="#">Pricing</a></li>
      <li><a class="link text-main " href="#">Support</a></li>
      <li><a class="link text-main " href="#">Contact</a></li>
    </ul>
  </footer>
  <script defer src="{{ mix('js/main.js') }}"></script>

</body>

</html>