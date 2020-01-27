<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Trakiny</title>

  {{-- Fonts --}}
  {{-- <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:600,700&display=swap" rel="stylesheet"> --}}
  {{-- 
  <link rel="preload" as="font" href="{{ asset('/fonts/JosefinSans-Bold.woff') }}" type="font/woff" crossorigin>
  <link rel="preload" as="font" href="{{ asset('/fonts/JosefinSans-SemiBold.woff') }}" type="font/woff" crossorigin>
  <link rel="preload" as="font" href="{{ asset('/fonts/JosefinSans-Regular.woff') }}" type="font/woff" crossorigin> --}}

  {{-- <link rel="preload" as="font" href="{{ asset('/fonts/JosefinSans-Bold.ttf') }}" type="font/ttf" crossorigin>
  <link rel="preload" as="font" href="{{ asset('/fonts/JosefinSans-SemiBold.ttf') }}" type="font/ttf" crossorigin>
  <link rel="preload" as="font" href="{{ asset('/fonts/JosefinSans-Regular.ttf') }}" type="font/ttf" crossorigin> --}}

  {{-- TODO: fast preload to fonts  --}}

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
  </style>


  {{-- CSS --}}
  <link rel="stylesheet" href=" {{ asset('css/main.css')}}">
</head>
{{--
   
  TODO: fixing background images 
  TODO: UI components
  TODO: adding content
  TODO: fixing responsive design
  TODO: adding interactions

--}}

<body>

  <header class="text-white bg-no-repeat bg-cover" style="background-image: url('{{asset('images/test.png')}}'); ">
    <div class="container m-auto px-6 md:px-0">
      <nav class="flex justify-between items-center py-8">
        <div id="logo" class=" -mt-1">
          <img class="w-full" src="./images/logo_w.png" alt="trackiny logo">
        </div>

        <ul class="hidden lg:flex">
          <li><a class="link" href="#">Home</a></li>
          <li><a class="link" href="#">Features</a></li>
          <li><a class="link" href="#">Pricing</a></li>
          <li><a class="link" href="#">Support</a></li>
          <li><a class="link" href="#">Contact</a></li>
        </ul>

        <div>
          <a href="#" class="hidden md:inline-block link">Login</a>
          <a href="#" class="hidden md:inline-block btn bg-secondary">Sign In</a>
          <a href="#" class="btn bg-cta">Start free now</a>
        </div>
      </nav>
    </div>
    <section class="md:py-40 pt-12 pb-32">
      <div class="container m-auto px-6 md:px-0">
        <div class="lg:flex items-center">
          <div class="lg:w-1/2 w-full my-auto">
            <h1 class="font-body font-bold text-3xl  leading-tight uppercase">
              Over 89% of E-com sellers struggle with
              <span class="text-secondary"> Paypal limitation</span>
            </h1>
            <p class="main-text font-semibold mt-4">
              Automatically migrate your tracking details from e-com platforms to PayPal with one magical click.
            </p>
            <p class="main-text text-mt-2 mb-6">
              Gain PayPal's Trust By Synchronizing Shipment Information With Your PayPal Account Affordably/easily.
            </p>

            <a href="#" class="btn bg-cta">Start free now</a>
            <a href="#" class="btn bg-secondary">Watch video</a>


          </div>

          <div class="md:w-1/2 hidden">
            <img src="{{ asset('images/mockup.png') }}" alt="mockup">
          </div>


        </div>
      </div>
    </section>
  </header>

  {{-- TODO: style="background-image : url('{{ asset('images/bg_features.png') }}); " --}}
  <section class="pb-32  -mt-32">
    <div class="w-4/5 mx-auto text-center shadow-lg">
      <h2 class="title text-white">Discover our suite of dicesion enablers</h2>
      <h4 class="title-helper text-white">Discover our suite of dicesion enablers</h4>
      <div class="md:flex flex-wrap mt-6 p-10">

        {{-- stopwatch --}}
        <div class="md:w-1/2 lg:w-1/4 py-12 border border-solid border-gray-300 w-full">
          <div class="relative w-12 h-12 flex flex-row justify-center items-center mx-auto mb-4">
            <div class="absolute top-0 left-0 bottom-0 right-0 border border-solid border-main rounded rotate-45">
            </div>
            <svg class="w-8 h-8 fill-current text-main" viewBox="0 0 57.019 60.5">
              <g transform="translate(-1.543 0.25)">
                <path
                  d="M31.634,37.989A3.558,3.558,0,0,0,34.24,36.53L43.6,23.586a1,1,0,0,0-1.4-1.4L29.26,31.555A3.564,3.564,0,0,0,31.354,38C31.447,38,31.54,38,31.634,37.989ZM29.8,34.315a1.56,1.56,0,0,1,.637-1.142l7.9-5.713-5.711,7.895a1.563,1.563,0,0,1-2.823-1.04Z" />
                <path
                  d="M54.034,19.564c-.01-.021-.01-.043-.021-.064s-.031-.031-.044-.05A27.185,27.185,0,0,0,50.4,14.641l2.148-2.147,1.414,1.414,4.242-4.243L53.966,5.423,49.723,9.665l1.415,1.415L48.99,13.227a27.154,27.154,0,0,0-4.809-3.566c-.019-.013-.03-.032-.05-.044s-.043-.011-.064-.022a26.811,26.811,0,0,0-10.273-3.4V5h1.5a2.5,2.5,0,1,0,0-5h-9a2.5,2.5,0,0,0,0,5h1.5V6.156a27.5,27.5,0,0,0-3.224.535,1,1,0,0,0,.447,1.949,25.431,25.431,0,0,1,2.78-.477l1.073-.083c.328-.025.63-.043.924-.057V10a1,1,0,0,0,2,0V8.03a24.805,24.805,0,0,1,10.456,2.845l-.986,1.707a1,1,0,1,0,1.732,1l.983-1.7a25.194,25.194,0,0,1,7.772,7.772l-1.7.983a1,1,0,0,0,1,1.732l1.707-.986A24.819,24.819,0,0,1,55.6,32H53.63a1,1,0,0,0,0,2H55.6a24.819,24.819,0,0,1-2.849,10.619l-1.707-.986a1,1,0,1,0-1,1.732l1.7.983a25.194,25.194,0,0,1-7.772,7.772L43,52.416a1,1,0,0,0-1.732,1l.986,1.707a24.805,24.805,0,0,1-10.456,2.845V56a1,1,0,0,0-2,0v1.976a25.235,25.235,0,0,1-4.776-.617,1,1,0,1,0-.447,1.949A27.021,27.021,0,0,0,30.63,60c.049,0,.1,0,.145,0,.007,0,.012,0,.018,0s.015-.005.023-.005a26.825,26.825,0,0,0,13.219-3.573.847.847,0,0,0,.094-.039c.02-.012.031-.031.05-.044a27.2,27.2,0,0,0,9.773-9.761.946.946,0,0,0,.06-.078c.012-.021.011-.043.021-.064a26.9,26.9,0,0,0,0-26.872ZM53.965,8.251l1.414,1.414L53.965,11.08,52.55,9.665ZM29.793,6.021V3h-3.5a.5.5,0,0,1,0-1h9a.5.5,0,0,1,0,1h-3.5V6.021c-.348-.014-.68-.021-1-.021L30.7,6,30.63,6c-.164,0-.328.011-.492.014C30.022,6.017,29.913,6.016,29.793,6.021Z" />
                <path d="M21.793,14h-5a1,1,0,0,0,0,2h5a1,1,0,0,0,0-2Z" />
                <path d="M21.793,21h-10a1,1,0,0,0,0,2h10a1,1,0,0,0,0-2Z" />
                <path d="M21.793,28h-15a1,1,0,0,0,0,2h15a1,1,0,0,0,0-2Z" />
                <path d="M21.793,35h-19a1,1,0,0,0,0,2h19a1,1,0,0,0,0-2Z" />
                <path d="M21.793,42h-13a1,1,0,0,0,0,2h13a1,1,0,0,0,0-2Z" />
                <path d="M21.793,49h-7a1,1,0,1,0,0,2h7a1,1,0,0,0,0-2Z" />
              </g>
            </svg>
          </div>
          <h3 class="font-semibold text-text-main">Feature</h3>
        </div>

        {{-- savemoney --}}
        <div class="md:w-1/2 lg:w-1/4 py-12 border border-solid border-gray-300 sm:w-full">
          <div class="relative w-12 h-12 flex flex-row justify-center items-center mx-auto mb-4">
            <div class="absolute top-0 left-0 bottom-0 right-0 border border-solid border-main rounded rotate-45">
            </div>

            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="97.203"
              height="58.951" viewBox="0 0 97.203 58.951">
              <defs>
                <filter id="a" x="-60" y="-57" width="217.203" height="178.951" filterUnits="userSpaceOnUse">
                  <feOffset dy="3" input="SourceAlpha" />
                  <feGaussianBlur stdDeviation="20" result="b" />
                  <feFlood flood-color="#e8efff" />
                  <feComposite operator="in" in2="b" />
                  <feComposite in="SourceGraphic" />
                </filter>
                <clipPath id="c">
                  <g transform="matrix(1, 0, 0, 1, 0, 0)" filter="url(#a)">
                    <path d="M0,0H97.2V58.731a.219.219,0,0,1-.219.219H.219A.219.219,0,0,1,0,58.731Z"
                      transform="translate(303 1284.57)" fill="#225dfe" stroke="#225dfe" stroke-width="0.3" />
                  </g>
                </clipPath>
              </defs>
              <g transform="translate(-763.583 -1452.711)">
                <g transform="translate(460.583 168.142)" clip-path="url(#c)">
                  <g transform="translate(322.122 1284.569)">
                    <g transform="translate(0 0)">
                      <path
                        d="M52.15,451.156a7.953,7.953,0,0,1-3.964,2.338l-13.518,2.439a3.734,3.734,0,0,0,.1-1.829,3.693,3.693,0,0,0-1.931-2.744L24.5,446.583a6.729,6.729,0,0,0-6.5-.1l-6.5,3.354-1.423-4.269a.964.964,0,0,0-.915-.813H1.026a1.255,1.255,0,0,0-.813.407.774.774,0,0,0-.1.915l8.131,24.393a.976.976,0,0,0,.915.711h8.131a1.255,1.255,0,0,0,.813-.406.988.988,0,0,0,.1-.915l-2.236-6.81h.61l11.282,3.964c.1,0,.2.1.3.1h.2l14.839-2.643a25.8,25.8,0,0,0,14.23-7.826,4.3,4.3,0,0,0,0-5.489A3.626,3.626,0,0,0,52.15,451.156ZM9.868,469.147l-7.42-22.361h6l7.42,22.361Zm46.043-13.925A23.455,23.455,0,0,1,42.8,462.439l-14.534,2.643-11.18-3.964c-.1,0-.2-.1-.3-.1H15.357l-3.151-9.452h.1l6.81-3.456a4.863,4.863,0,0,1,4.574.1l8.334,4.777a1.791,1.791,0,0,1,.915,1.321,2.191,2.191,0,0,1-.508,1.728,1.015,1.015,0,0,1-.508.407l-.813.1a.768.768,0,0,1-.406-.1l-9.859-3.456a.964.964,0,0,0-.61,1.83l9.859,3.456a2.967,2.967,0,0,0,.915.2c.1,0,.3.1.508,0l17.075-3.049a10.176,10.176,0,0,0,5.082-2.846,1.547,1.547,0,0,1,2.338,0A2.013,2.013,0,0,1,55.911,455.222Z"
                        transform="translate(0 -412.229)" fill="#225dfe" stroke="#225dfe" stroke-width="0.3" />
                      <path
                        d="M350.922,34.62a17.279,17.279,0,1,0-17.279-17.279A17.264,17.264,0,0,0,350.922,34.62Zm0-32.525a15.246,15.246,0,1,1-15.246,15.246A15.225,15.225,0,0,1,350.922,2.1Z"
                        transform="translate(-309.241 -0.063)" fill="#225dfe" stroke="#225dfe" stroke-width="0.3" />
                      <path
                        d="M402.443,82.076A13.213,13.213,0,1,0,389.23,68.863,13.187,13.187,0,0,0,402.443,82.076Zm0-24.393a11.18,11.18,0,1,1-11.18,11.18A11.148,11.148,0,0,1,402.443,57.682Z"
                        transform="translate(-360.761 -51.584)" fill="#225dfe" stroke="#225dfe" stroke-width="0.3" />
                      <path
                        d="M501.418,176.985a1.1,1.1,0,0,0,.711-.3l8.131-8.131a1.006,1.006,0,0,0-1.423-1.423l-8.131,8.131a.983.983,0,0,0,0,1.423A1.1,1.1,0,0,0,501.418,176.985Z"
                        transform="translate(-463.803 -154.624)" fill="#225dfe" stroke="#225dfe" stroke-width="0.3" />
                      <path
                        d="M501.418,172.919a.923.923,0,0,0,.711-.3l4.066-4.066a1.006,1.006,0,0,0-1.423-1.423l-4.066,4.066a.983.983,0,0,0,0,1.423A.923.923,0,0,0,501.418,172.919Z"
                        transform="translate(-463.803 -154.624)" fill="#225dfe" stroke="#225dfe" stroke-width="0.3" />
                      <path
                        d="M560.358,222.713l-4.066,4.066a.982.982,0,0,0,0,1.423.982.982,0,0,0,1.423,0l4.066-4.066a1.006,1.006,0,1,0-1.423-1.423Z"
                        transform="translate(-515.322 -206.146)" fill="#225dfe" stroke="#225dfe" stroke-width="0.3" />
                      <circle cx="1.016" cy="1.016" r="1.016" transform="translate(11.191 52.858)" fill="#225dfe"
                        stroke="#225dfe" stroke-width="0.3" />
                    </g>
                  </g>
                </g>
              </g>
            </svg>
          </div>
          <h3 class="font-semibold text-sm text-main">Feature</h3>
        </div>

        {{-- linked TODO: hover state --}}
        <div class="md:w-1/2 lg:w-1/4 py-12 border border-solid border-gray-300 sm:w-full shadow-lg">
          <div class="relative w-12 h-12 flex flex-row justify-center items-center mx-auto mb-4">
            <div
              class="absolute top-0 left-0 bottom-0 right-0 border border-solid border-main rounded rotate-45 bg-main">
            </div>

            <svg class="w-8 h-8 fill-current text-white z-10" viewBox="0 0 53.909 53.909">
              <path
                d="M208.652,152.985l-9.776-9.869a14.646,14.646,0,0,0-10.428-4.283,15.045,15.045,0,0,0-10.428,4.283.9.9,0,0,0,0,1.3l4.935,4.935a.9.9,0,0,0,1.3,0,5.846,5.846,0,0,1,8.38,0l9.776,9.776a5.926,5.926,0,1,1-8.38,8.38l-2.421-2.328a4.411,4.411,0,1,0-6.238,6.238l2.421,2.421a14.646,14.646,0,0,0,10.428,4.283,15.045,15.045,0,0,0,10.428-4.283,14.489,14.489,0,0,0,4.283-10.428A15.045,15.045,0,0,0,208.652,152.985Zm-1.3,19.459a12.9,12.9,0,0,1-9.125,3.817,12.523,12.523,0,0,1-9.125-3.817l-2.421-2.421a2.421,2.421,0,0,1,0-3.538,2.473,2.473,0,0,1,3.538,0l2.421,2.421a7.9,7.9,0,1,0,11.173-11.173l-9.776-9.683a7.814,7.814,0,0,0-5.586-2.328,7.651,7.651,0,0,0-4.842,1.676l-3.631-3.631a12.742,12.742,0,0,1,8.473-3.166,12.523,12.523,0,0,1,9.125,3.817l9.776,9.776a12.9,12.9,0,0,1,3.817,9.125A12.522,12.522,0,0,1,207.348,172.445Z"
                transform="translate(-159.026 -124.215)" />
              <path
                d="M34.915,33.612l-4.935-4.935a.9.9,0,0,0-1.3,0,5.846,5.846,0,0,1-8.38,0L10.521,18.9a5.926,5.926,0,1,1,8.38-8.38l2.421,2.421a4.5,4.5,0,0,0,6.238,0,4.5,4.5,0,0,0,0-6.238L25.139,4.283A14.646,14.646,0,0,0,14.711,0,15.045,15.045,0,0,0,4.283,4.283,14.335,14.335,0,0,0,0,14.711,14.489,14.489,0,0,0,4.283,25.139l9.776,9.776A14.646,14.646,0,0,0,24.487,39.2a15.045,15.045,0,0,0,10.428-4.283A.9.9,0,0,0,34.915,33.612ZM24.58,37.522A12.522,12.522,0,0,1,15.456,33.7L5.68,23.835a12.676,12.676,0,0,1-3.817-9.125A12.523,12.523,0,0,1,5.68,5.586,12.522,12.522,0,0,1,14.8,1.769a12.523,12.523,0,0,1,9.125,3.817l2.421,2.421a2.421,2.421,0,0,1,0,3.538,2.5,2.5,0,0,1-3.538,0L20.391,9.125A7.9,7.9,0,1,0,9.218,20.3l9.776,9.776A7.815,7.815,0,0,0,24.58,32.4a7.651,7.651,0,0,0,4.842-1.676l3.631,3.631A12.742,12.742,0,0,1,24.58,37.522Z" />
              <path
                d="M106.394,105.509a.9.9,0,0,0,0,1.3l3.724,3.724a.9.9,0,0,0,1.3,0,.9.9,0,0,0,0-1.3l-3.724-3.724A.9.9,0,0,0,106.394,105.509Z"
                transform="translate(-94.941 -94.15)" />
              <path
                d="M358.369,358.416a.845.845,0,0,0,.652-.279.9.9,0,0,0,0-1.3l-3.724-3.724a.922.922,0,1,0-1.3,1.3l3.724,3.724A.845.845,0,0,0,358.369,358.416Z"
                transform="translate(-316.47 -315.679)" />
              <path d="M333.519,50.967a.9.9,0,0,0,1.3,0,.9.9,0,0,0,0-1.3l-14.9-14.9a.922.922,0,1,0-1.3,1.3Z"
                transform="translate(-284.824 -30.856)" />
              <path d="M428.46,39.794a.9.9,0,0,0,1.3,0,.9.9,0,0,0,0-1.3l-3.724-3.724a.922.922,0,0,0-1.3,1.3Z"
                transform="translate(-379.765 -30.856)" />
              <path d="M36.954,317.738a.922.922,0,1,0-1.3,1.3l14.9,14.9a.9.9,0,0,0,1.3,0,.9.9,0,0,0,0-1.3Z"
                transform="translate(-31.647 -284.033)" />
              <path d="M36.954,423.852a.922.922,0,1,0-1.3,1.3l3.724,3.724a.9.9,0,0,0,1.3,0,.9.9,0,0,0,0-1.3Z"
                transform="translate(-31.647 -378.974)" /></svg>

          </div>
          <h3 class="font-semibold text-sm text-main">Feature</h3>
        </div>

        {{-- idea --}}
        <div class="md:w-1/2 lg:w-1/4 py-12 border border-solid border-gray-300 sm:w-full">
          <div class="relative w-12 h-12 flex flex-row justify-center items-center mx-auto mb-4">
            <div class="absolute top-0 left-0 bottom-0 right-0 border border-solid border-main rounded rotate-45">
            </div>
            <svg class="w-8 h-8 fill-current text-main" viewBox="0 0 46.203 63.505">
              <g transform="translate(-70.05 0.25)">
                <g transform="translate(70.3)">
                  <g transform="translate(0)">
                    <path
                      d="M93.152,0A22.849,22.849,0,0,0,70.3,22.852a22.319,22.319,0,0,0,4.462,13.493.107.107,0,0,0,.109.109l7.617,11.317H82.27a3.265,3.265,0,1,0,0,6.529h1.306a3.193,3.193,0,0,0,3.047,4.353h1.088v3.265A1.028,1.028,0,0,0,88.8,63.005H97.5a1.028,1.028,0,0,0,1.088-1.088V58.652h1.088a3.193,3.193,0,0,0,3.047-4.353h1.306a3.265,3.265,0,1,0,0-6.529h-.109l7.617-11.317v-.109A22.319,22.319,0,0,0,116,22.852,22.849,22.849,0,0,0,93.152,0Zm10.882,50.056a1.088,1.088,0,1,1,0,2.176H99.681a1.088,1.088,0,0,0,0,2.176,1.088,1.088,0,0,1,0,2.176H93.152a1.088,1.088,0,1,0,0,2.176h3.265v2.176H89.887V57.673A1.028,1.028,0,0,0,88.8,56.585H86.623a1.088,1.088,0,1,1,0-2.176h6.529a1.088,1.088,0,1,0,0-2.176H82.27a1.088,1.088,0,0,1,0-2.176h21.763ZM89.887,47.879V42.438a1.028,1.028,0,0,1,1.088-1.088h4.353a1.028,1.028,0,0,1,1.088,1.088v5.441H89.887Zm19.8-12.623-.218.218-8.161,12.405h-2.72V42.438a3.206,3.206,0,0,0-3.265-3.265H94.24V28.183a3.012,3.012,0,0,1,.326-1.415l3.917-7.835a1.27,1.27,0,0,0,0-1.088,1.621,1.621,0,0,0-.979-.435H88.8a1.088,1.088,0,1,0,0,2.176h6.964l-3.156,6.2a6.367,6.367,0,0,0-.544,2.394V39.174H90.975a3.206,3.206,0,0,0-3.265,3.265v5.441H84.99L76.829,35.474a.38.38,0,0,0-.109-.218,19.921,19.921,0,0,1-4.244-12.405,20.675,20.675,0,1,1,37.215,12.405Z"
                      transform="translate(-70.3)" />
                    <path
                      d="M124.171,35.371a18.483,18.483,0,0,0-18.5,18.5,1.088,1.088,0,1,0,2.176,0,16.3,16.3,0,0,1,16.322-16.322,1.088,1.088,0,1,0,0-2.176Z"
                      transform="translate(-101.319 -31.018)" />
                  </g>
                </g>
              </g>
            </svg>
          </div>
          <h3 class="font-semibold text-sm text-main">Feature</h3>
        </div>


        {{-- server --}}
        <div class="md:w-1/2 lg:w-1/4 py-12 border border-solid border-gray-300 sm:w-full">
          <div class="relative w-12 h-12 flex flex-row justify-center items-center mx-auto mb-4">
            <div class="absolute top-0 left-0 bottom-0 right-0 border border-solid border-main rounded rotate-45">
            </div>
            <svg class="w-8 h-8 fill-current text-main" viewBox="0 0 54.721 54.721">
              <g transform="translate(0.15 0.15)">
                <path
                  d="M393.106,35.31A4.691,4.691,0,1,0,397.8,40,4.646,4.646,0,0,0,393.106,35.31Zm0,7.506A2.815,2.815,0,1,1,395.92,40,2.765,2.765,0,0,1,393.106,42.816Z"
                  transform="translate(-347.129 -31.557)" />
                <path
                  d="M59.706,36.248a.886.886,0,0,0-.938-.938H36.248a.938.938,0,0,0,0,1.877H58.767A.886.886,0,0,0,59.706,36.248Z"
                  transform="translate(-31.557 -31.557)" />
                <circle cx="0.938" cy="0.938" r="0.938" transform="translate(11.259 11.259)" fill="#225dfe"
                  stroke="#225dfe" stroke-width="0.3" />
                <circle cx="0.938" cy="0.938" r="0.938" transform="translate(15.013 11.259)" fill="#225dfe"
                  stroke="#225dfe" stroke-width="0.3" />
                <circle cx="0.938" cy="0.938" r="0.938" transform="translate(18.766 11.259)" fill="#225dfe"
                  stroke="#225dfe" stroke-width="0.3" />
                <circle cx="0.938" cy="0.938" r="0.938" transform="translate(22.519 11.259)" fill="#225dfe"
                  stroke="#225dfe" stroke-width="0.3" />
                <circle cx="0.938" cy="0.938" r="0.938" transform="translate(26.272 11.259)" fill="#225dfe"
                  stroke="#225dfe" stroke-width="0.3" />
                <path d="M160.945,70.621H142.179a.938.938,0,1,0,0,1.877h18.766a.938.938,0,0,0,0-1.877Z"
                  transform="translate(-126.228 -63.115)" />
                <path
                  d="M393.106,176.552a4.691,4.691,0,1,0,4.691,4.691A4.646,4.646,0,0,0,393.106,176.552Zm0,7.506a2.815,2.815,0,1,1,2.815-2.815A2.765,2.765,0,0,1,393.106,184.058Z"
                  transform="translate(-347.129 -157.786)" />
                <path d="M192.5,176.552H177.489a.938.938,0,0,0,0,1.877H192.5a.938.938,0,0,0,0-1.877Z"
                  transform="translate(-157.785 -157.786)" />
                <circle cx="0.938" cy="0.938" r="0.938" transform="translate(15.013 26.272)" fill="#225dfe"
                  stroke="#225dfe" stroke-width="0.3" />
                <circle cx="0.938" cy="0.938" r="0.938" transform="translate(18.766 26.272)" fill="#225dfe"
                  stroke="#225dfe" stroke-width="0.3" />
                <circle cx="0.938" cy="0.938" r="0.938" transform="translate(22.519 26.272)" fill="#225dfe"
                  stroke="#225dfe" stroke-width="0.3" />
                <circle cx="0.938" cy="0.938" r="0.938" transform="translate(26.272 26.272)" fill="#225dfe"
                  stroke="#225dfe" stroke-width="0.3" />
                <circle cx="0.938" cy="0.938" r="0.938" transform="translate(30.025 26.272)" fill="#225dfe"
                  stroke="#225dfe" stroke-width="0.3" />
                <circle cx="0.938" cy="0.938" r="0.938" transform="translate(33.778 26.272)" fill="#225dfe"
                  stroke="#225dfe" stroke-width="0.3" />
                <path d="M66.274,211.862H36.248a.938.938,0,0,0,0,1.877H66.274a.938.938,0,0,0,0-1.877Z"
                  transform="translate(-31.557 -189.343)" />
                <path
                  d="M54.421,12.2V4.691A4.646,4.646,0,0,0,49.729,0H4.691A4.646,4.646,0,0,0,0,4.691V12.2a4.755,4.755,0,0,0,1.877,3.753A4.755,4.755,0,0,0,0,19.7V27.21a4.755,4.755,0,0,0,1.877,3.753A4.755,4.755,0,0,0,0,34.717v7.506a4.646,4.646,0,0,0,4.691,4.691H22.519V49.73A2.685,2.685,0,0,1,19.7,52.544H4.691a.938.938,0,1,0,0,1.877H19.7A4.51,4.51,0,0,0,24.4,49.73V46.915h1.877v6.568a.938.938,0,0,0,1.877,0V46.915h1.877V49.73a.938.938,0,1,0,1.877,0V46.915H49.73a4.646,4.646,0,0,0,4.691-4.691V34.717a4.755,4.755,0,0,0-1.877-3.753,4.756,4.756,0,0,0,1.876-3.753V19.7a4.755,4.755,0,0,0-1.877-3.753A4.755,4.755,0,0,0,54.421,12.2ZM52.544,42.223a2.765,2.765,0,0,1-2.815,2.815H4.691a2.765,2.765,0,0,1-2.815-2.815V34.717A2.765,2.765,0,0,1,4.691,31.9H49.729a2.765,2.765,0,0,1,2.815,2.815Zm0-15.013a2.765,2.765,0,0,1-2.815,2.815H4.691A2.765,2.765,0,0,1,1.877,27.21V19.7a2.765,2.765,0,0,1,2.815-2.815H49.729A2.765,2.765,0,0,1,52.544,19.7Zm0-15.013a2.765,2.765,0,0,1-2.815,2.815H4.691A2.765,2.765,0,0,1,1.877,12.2V4.691A2.765,2.765,0,0,1,4.691,1.877H49.729a2.765,2.765,0,0,1,2.815,2.815Z" />
                <path
                  d="M393.106,317.793a4.691,4.691,0,1,0,4.691,4.691A4.646,4.646,0,0,0,393.106,317.793Zm0,7.506a2.815,2.815,0,1,1,2.815-2.815A2.765,2.765,0,0,1,393.106,325.3Z"
                  transform="translate(-347.129 -284.015)" />
                <path d="M36.248,319.669h11.26a.938.938,0,1,0,0-1.877H36.248a.938.938,0,0,0,0,1.877Z"
                  transform="translate(-31.557 -284.014)" />
                <circle cx="0.938" cy="0.938" r="0.938" transform="translate(3.753 41.285)" fill="#225dfe"
                  stroke="#225dfe" stroke-width="0.3" />
                <circle cx="0.938" cy="0.938" r="0.938" transform="translate(7.506 41.285)" fill="#225dfe"
                  stroke="#225dfe" stroke-width="0.3" />
                <circle cx="0.938" cy="0.938" r="0.938" transform="translate(11.259 41.285)" fill="#225dfe"
                  stroke="#225dfe" stroke-width="0.3" />
                <circle cx="0.938" cy="0.938" r="0.938" transform="translate(15.013 41.285)" fill="#225dfe"
                  stroke="#225dfe" stroke-width="0.3" />
                <circle cx="0.938" cy="0.938" r="0.938" transform="translate(30.025 41.285)" fill="#225dfe"
                  stroke="#225dfe" stroke-width="0.3" />
                <circle cx="0.938" cy="0.938" r="0.938" transform="translate(33.778 41.285)" fill="#225dfe"
                  stroke="#225dfe" stroke-width="0.3" />
                <path d="M66.274,353.1H36.248a.938.938,0,0,0,0,1.877H66.274a.938.938,0,0,0,0-1.877Z"
                  transform="translate(-31.557 -315.571)" />
              </g>
            </svg>
          </div>
          <h3 class="font-semibold text-sm text-main">Feature</h3>
        </div>


        {{-- plug --}}
        <div class="md:w-1/2 lg:w-1/4 py-12 border border-solid border-gray-300 sm:w-full">
          <div class="relative w-12 h-12 flex flex-row justify-center items-center mx-auto mb-4">
            <div class="absolute top-0 left-0 bottom-0 right-0 border border-solid border-main rounded rotate-45">
            </div>
            <svg class="w-8 h-8 fill-current text-main" viewBox="0 0 70.6 51.207">
              <g transform="translate(0.15 -63.85)">
                <g transform="translate(24.241 78.545)">
                  <g transform="translate(0 0)">
                    <path
                      d="M161.211,160A1.211,1.211,0,0,0,160,161.212v19.393a1.212,1.212,0,0,0,2.424,0V161.212A1.211,1.211,0,0,0,161.211,160Z"
                      transform="translate(-159.999 -160)" />
                  </g>
                </g>
                <g transform="translate(54.543 64)">
                  <g transform="translate(0 0)">
                    <path
                      d="M374.544,68.848H362.423V65.212a1.212,1.212,0,0,0-2.424,0V113.7a1.212,1.212,0,0,0,2.424,0v-3.636h12.121a1.211,1.211,0,0,0,1.212-1.212V70.06A1.211,1.211,0,0,0,374.544,68.848Zm-1.212,38.786H362.423V71.272h10.909Z"
                      transform="translate(-359.999 -64)" />
                  </g>
                </g>
                <g transform="translate(0 64)">
                  <g transform="translate(0 0)">
                    <path
                      d="M47.271,97.938H41.21V80.969h6.06a3.636,3.636,0,1,0,0-7.272H41.21V65.212a1.212,1.212,0,0,0-2.424,0v3.636H25.453a1.211,1.211,0,0,0-1.212,1.212v3.682A15.771,15.771,0,0,0,9.747,88.394a5.812,5.812,0,0,0-4.9,5.908c0,3.349-3.315,3.617-3.687,3.637a1.212,1.212,0,0,0,.05,2.423h.052A5.946,5.946,0,0,0,7.272,94.3a3.345,3.345,0,0,1,2.494-3.4,15.781,15.781,0,0,0,14.475,14.266v3.683a1.211,1.211,0,0,0,1.212,1.212H38.786V113.7a1.212,1.212,0,0,0,2.424,0v-8.485h6.06a3.636,3.636,0,1,0,0-7.272ZM41.21,76.121h6.06a1.212,1.212,0,1,1,0,2.424H41.21ZM38.786,99.15v8.485H26.665V104a1.211,1.211,0,0,0-1.212-1.212,13.333,13.333,0,0,1,0-26.666,1.211,1.211,0,0,0,1.212-1.212V71.272H38.786Zm8.485,3.636H41.21v-2.424h6.06a1.212,1.212,0,1,1,0,2.424Z"
                      transform="translate(0 -64)" />
                  </g>
                </g>
                <g transform="translate(58.179 73.696)">
                  <path
                    d="M390.915,128.353a1.211,1.211,0,0,0-1.714,0l-4.848,4.848a1.212,1.212,0,1,0,1.714,1.714l4.848-4.848A1.211,1.211,0,0,0,390.915,128.353Z"
                    transform="translate(-383.997 -127.998)" />
                </g>
                <g transform="translate(58.179 78.545)">
                  <g transform="translate(0 0)">
                    <path
                      d="M390.915,160.353a1.211,1.211,0,0,0-1.714,0l-4.848,4.848a1.212,1.212,0,1,0,1.714,1.714l4.848-4.848A1.211,1.211,0,0,0,390.915,160.353Z"
                      transform="translate(-383.997 -159.998)" />
                  </g>
                </g>
              </g>
            </svg>
          </div>
          <h3 class="font-semibold text-sm text-main">Easy to use</h3>
        </div>

        {{-- syncing --}}
        <div class="md:w-1/2 lg:w-1/4 py-12 border border-solid border-gray-300 sm:w-full">
          <div class="relative w-12 h-12 flex flex-row justify-center items-center mx-auto mb-4">
            <div class="absolute top-0 left-0 bottom-0 right-0 border border-solid border-main rounded rotate-45">
            </div>
            <svg class="w-8 h-8 fill-current text-main" viewBox="0 0 67.955 58.087">
              <g transform="translate(0 -33.978)">
                <g transform="translate(0 33.978)">
                  <g transform="translate(0)">
                    <path
                      d="M55.938,44.353A29.038,29.038,0,0,0,4.677,61.86H1.162a1.161,1.161,0,0,0-.821,1.983l9.294,9.294a1.161,1.161,0,0,0,1.643,0l9.294-9.294a1.161,1.161,0,0,0-.821-1.983H16.324A17.4,17.4,0,0,1,46.987,51.778a5.8,5.8,0,0,0,4.179,2.046,5.9,5.9,0,0,0,4.36-1.7A5.8,5.8,0,0,0,55.938,44.353ZM16.946,64.183l-6.489,6.489L3.967,64.183H16.946Zm36.938-13.7A3.509,3.509,0,0,1,51.262,51.5a3.419,3.419,0,0,1-2.5-1.224A19.738,19.738,0,0,0,13.975,61.86H7A26.719,26.719,0,0,1,54.16,45.849,3.457,3.457,0,0,1,53.883,50.48Z"
                      transform="translate(0 -33.978)" />
                  </g>
                </g>
                <g transform="translate(10.716 52.565)">
                  <path
                    d="M130.69,171.611l-9.294-9.294a1.16,1.16,0,0,0-1.643,0l-9.294,9.294a1.161,1.161,0,0,0,.821,1.983h3.428a17.4,17.4,0,0,1-30.665,10.082,5.815,5.815,0,0,0-8.951,7.425,29.038,29.038,0,0,0,51.262-17.506h3.514a1.161,1.161,0,0,0,.821-1.983ZM97.34,199.152A26.666,26.666,0,0,1,76.871,189.6a3.5,3.5,0,0,1,2.744-5.658q.077,0,.153,0a3.419,3.419,0,0,1,2.5,1.224,19.739,19.739,0,0,0,34.789-11.581h6.977A26.754,26.754,0,0,1,97.34,199.152Zm27.882-27.882H114.085l6.489-6.489,6.489,6.489Z"
                    transform="translate(-73.791 -161.976)" />
                </g>
                <g transform="translate(16.1 38.635)">
                  <path
                    d="M145.707,73.184a24.425,24.425,0,0,0-34.5,0,1.162,1.162,0,0,0,1.643,1.643,22.1,22.1,0,0,1,31.217,0,1.162,1.162,0,1,0,1.643-1.643Z"
                    transform="translate(-110.864 -66.05)" />
                </g>
                <g transform="translate(16.1 78.29)">
                  <g transform="translate(0 0)">
                    <path
                      d="M145.708,339.461a1.162,1.162,0,0,0-1.644,0,22.1,22.1,0,0,1-31.217,0A1.162,1.162,0,0,0,111.2,341.1a24.426,24.426,0,0,0,34.5,0A1.16,1.16,0,0,0,145.708,339.461Z"
                      transform="translate(-110.864 -339.12)" />
                  </g>
                </g>
              </g>
            </svg>
          </div>
          <h3 class="font-semibold text-sm text-main">Easy to use</h3>
        </div>


        {{-- target --}}
        <div class="md:w-1/2 lg:w-1/4 py-12 border border-solid border-gray-300 sm:w-full">
          <div class="relative w-12 h-12 flex flex-row justify-center items-center mx-auto mb-4">
            <div class="absolute top-0 left-0 bottom-0 right-0 border border-solid border-main rounded rotate-45">
            </div>
            <svg class="w-8 h-8 fill-current text-main" viewBox="0 0 59.948 59.994">
              <g transform="translate(-0.195 0)">
                <g transform="translate(0.195 0)">
                  <g transform="translate(0 0)">
                    <path d="M411.178,411.91c.1,0,.1-.1,0,0Z" transform="translate(-363.021 -363.603)" />
                    <path
                      d="M79.209,79.509A25.72,25.72,0,0,0,79.313,43v-.1c0-.1,0,0-.1,0a25.634,25.634,0,0,0-18.2-7.55,25.963,25.963,0,0,0-14.48,4.447,1.047,1.047,0,0,0,1.138,1.758,23.078,23.078,0,0,1,12.308-4.137v3.1a.977.977,0,0,0,1.034,1.034A19.643,19.643,0,0,1,80.657,61.2a.977.977,0,0,0,1.034,1.034h3.1a22.549,22.549,0,0,1-6.206,15l-2.172-2.172a1.024,1.024,0,0,0-1.448,1.448l2.172,2.172a23.664,23.664,0,0,1-15,6.206v-3.1a1.034,1.034,0,1,0-2.069,0v3.1a23.432,23.432,0,0,1-15-6.206l2.172-2.172A1.024,1.024,0,0,0,45.8,75.061l-2.172,2.172a22.235,22.235,0,0,1-6.413-15h3.1a1.034,1.034,0,0,0,0-2.069h-3.1a24.661,24.661,0,0,1,3.93-12.1,1.047,1.047,0,0,0-1.758-1.138A25.92,25.92,0,0,0,35.148,61.2a25.634,25.634,0,0,0,7.55,18.2v.1c0,.1,0,0,.1,0a25.719,25.719,0,0,0,36.407,0ZM62.04,39.585V37.413a23.432,23.432,0,0,1,15,6.206L75.589,45.17A21.338,21.338,0,0,0,62.04,39.585ZM82.623,60.167a21.336,21.336,0,0,0-5.585-13.549l1.448-1.448a22.765,22.765,0,0,1,6.206,15H82.623Z"
                      transform="translate(-31.052 -31.203)" />
                    <path
                      d="M5.325,10.347H9.048L27.666,28.965H26.011a1.034,1.034,0,0,0,0,2.069h4.137a.38.38,0,0,0,.31-.1h.1c.1,0,.1-.1.207-.1a.1.1,0,0,0,.1-.1c.1-.1.1-.207.207-.31,0-.1.1-.207.1-.31V25.965a1.034,1.034,0,1,0-2.069,0V27.62L10.5,9V5.176a.939.939,0,0,0-.31-.724L6.049.315A.944.944,0,0,0,4.911.108a.9.9,0,0,0-.621.931v3.1h-3.1a.9.9,0,0,0-.931.621A1.127,1.127,0,0,0,.464,5.9L4.6,10.037A.939.939,0,0,0,5.325,10.347ZM6.359,3.521,8.428,5.59V6.831L6.359,4.762ZM4.911,6.21,6.98,8.279H5.739L3.67,6.21Z"
                      transform="translate(-0.195 0)" />
                    <path
                      d="M109.384,114.647a1.047,1.047,0,0,0-1.448.414,17.254,17.254,0,0,0-2.172,8.481,17.583,17.583,0,1,0,17.583-17.583,17.254,17.254,0,0,0-8.481,2.172,1.065,1.065,0,0,0,1.034,1.862,15.788,15.788,0,0,1,7.55-1.965,15.515,15.515,0,1,1-15.515,15.515,14.968,14.968,0,0,1,1.965-7.55A1.181,1.181,0,0,0,109.384,114.647Z"
                      transform="translate(-93.394 -93.543)" />
                    <circle cx="1.034" cy="1.034" r="1.034" transform="translate(28.919 16.549)" />
                    <circle cx="1.034" cy="1.034" r="1.034" transform="translate(28.919 41.372)" />
                    <circle cx="1.034" cy="1.034" r="1.034" transform="translate(16.507 28.961)" />
                    <circle cx="1.034" cy="1.034" r="1.034" transform="translate(41.331 28.961)" />
                    <circle cx="1.034" cy="1.034" r="1.034" transform="translate(37.716 37.743)" />
                    <circle cx="1.034" cy="1.034" r="1.034" transform="translate(20.141 37.761)" />
                    <circle cx="1.034" cy="1.034" r="1.034" transform="translate(37.694 20.167)" />
                    <path
                      d="M276.991,247.191a.977.977,0,0,0-1.034,1.034,27.942,27.942,0,0,1-27.926,27.926,1.034,1.034,0,1,0,0,2.069,30.016,30.016,0,0,0,29.995-29.995A.977.977,0,0,0,276.991,247.191Z"
                      transform="translate(-218.077 -218.226)" />
                  </g>
                </g>
              </g>
            </svg>
          </div>
          <h3 class="font-semibold text-sm text-main">Easy to use</h3>
        </div>




      </div>
    </div>
  </section>


  <section class="py-32">
    <div class="w-4/5 mx-auto text-center">
      <h2 class="title">Why Trackiny</h2>

      <p class="main-text mt-10">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque numquam nesciunt rerum provident. Asperiores,
        perferendis nostrum, perspiciatis eos alias libero sint fuga harum consectetur excepturi nisi veniam minus
        doloribus saepe nulla distinctio corporis reiciendis aliquid ducimus commodi accusamus at eligendi. Aperiam
        possimus officia nemo ut adipisci doloribus, doloremque ipsum nulla, delectus illo dolore eveniet sapiente
        numquam, expedita quae? Voluptates, possimus itaque assumenda temporibus quasi veniam sint. Distinctio a
        officiis molestiae excepturi eveniet quisquam aliquid nam maiores veniam.
      </p>

      <p class="main-text mt-8">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque numquam nesciunt rerum provident. Asperiores,
        perferendis nostrum, perspiciatis eos alias libero sint fuga harum consectetur excepturi nisi veniam minus
        doloribus saepe nulla distinctio corporis reiciendis aliquid ducimus commodi accusamus at eligendi.
      </p>

      <a href="#" class="btn mt-8 bg-cta">Start free trail now</a>
    </div>
  </section>


  <section class="my-32 bg-main" style="background: linear-gradient(#2757ff 0%, #2658ff 10.5%, #0682fe 100%);">
    <div class="container m-auto">
      <div class="lg:flex relative">
        <div class="lg:w-1/2 w-full rounded-bl-large shadow-2xl text-white p-10 bg-main md:absolute md:-bottom-6 ">

          <img class="w-12 h-12" src="{{asset('images/quote.png')}}" alt="two commas">
          <p class="main-text text-white mt-12">
            Growing your business and taking your store to the next level is not something easy especially if you have
            many tasks to do manually. Transmitting the shipment details from your store to paypal account might take
            several hours (especially if you do it manually). So why not doing it automatically to save your time and
            gain Paypal’s trust .
            this is where the idea of Trackiny came from.
          </p>
          <div class="w-1/3 ml-auto flex mt-12">
            <div class="w-10 h-10 rounded-full mr-4">
              <img src="{{ asset('images/admin.png') }}" alt="user avatar">
            </div>
            <p class="text-sm">
              <span class="font-bold">Beraadi Fouad</span>
              <br>
              <span>Co. Founder</span>
            </p>
          </div>
        </div>
        <div class="lg:w-1/2 hidden ml-auto" style="background-image:url('{{ asset('images/founder.png') }}');">

          <img class="m-auto h-large" src="{{ asset('images/founder.png') }}" alt="founder">
        </div>

      </div>
    </div>
  </section>



  <section class="py-32">
    <div class="container mx-auto">

      <div class="md:flex items-center ">
        <div class="md:w-1/2 w-full p-6">
          <div class="shadow-lg">
            {{-- TODO:screenshot --}}

            <img class="h-full w-full" src="https://via.placeholder.com/300" alt="placeholder image">

          </div>

        </div>
        <div class="md:w-1/2 w-full p-6">
          <h2 class="title-helper">Why Trackiny</h2>

          <p class="main-text text-gray-800 mt-6">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum consectetur soluta ad nobis enim quam
            suscipit at ullam ea, quia amet, assumenda mollitia qui magni praesentium porro, doloribus libero quasi.
          </p>

          <p class="main-text text-gray-800 mt-6">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum consectetur soluta ad nobis enim quam
            suscipit at ullam ea, quia amet, assumenda mollitia qui magni praesentium porro, doloribus libero quasi.
          </p>

        </div>
      </div>

      <div class="md:flex items-center mt-10">
        <div class="md:w-1/2 w-full p-6">
          <h2 class="title-helper">Why Trackiny</h2>

          <p class="text-sm text-gray-700 mt-6">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum consectetur soluta ad nobis enim quam
            suscipit at ullam ea, quia amet, assumenda mollitia qui magni praesentium porro, doloribus libero quasi.
          </p>

          <p class="text-sm text-gray-700 mt-6">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum consectetur soluta ad nobis enim quam
            suscipit at ullam ea, quia amet, assumenda mollitia qui magni praesentium porro, doloribus libero quasi.
          </p>

        </div>
        <div class="md:w-1/2 sm:w-full p-6">
          <div class="shadow-lg">

            {{-- TODO:screenshot --}}

            <img class="w-full h-full" src="https://via.placeholder.com/300" alt="placeholder image">


          </div>

        </div>
      </div>

    </div>

  </section>



  <section class="py-32 bg-gray-300">
    <h2 class="title text-center text-gray-800">1000+ users recommends Trackiny</h2>


    <div class="mt-12 flex">
      <div class="shadow-lg bg-main mx-6 rounded-lg w-1/3 text-white py-6 px-8">
        <p class="main-text">
          Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempora fuga repellat est neque tenetur, sed
          reprehenderit vero a totam et maiores numquam optio molestiae inventore ipsa rem dolorem animi similique!
        </p>

        <div class="w-1/2 ml-auto flex mt-12">
          <div class="w-10 h-10 rounded-full mr-4">
            <img src="{{ asset('images/admin.png') }}" alt="user avatar">
          </div>
          <p class="text-sm">
            <span class="font-bold">Beraadi Fouad</span>
            <br>
            <span>Co. Founder</span>
          </p>
        </div>
      </div>

      <div class="shadow-lg bg-white mx-6 rounded-lg w-1/3 text-white py-6 px-8">
        <p class="main-text text-gray-800">
          Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempora fuga repellat est neque tenetur, sed
          reprehenderit vero a totam et maiores numquam optio molestiae inventore ipsa rem dolorem animi similique!
        </p>

        <div class="w-1/2 ml-auto flex mt-12">
          <div class="w-10 h-10 rounded-full mr-4">
            <img src="{{ asset('images/admin.png') }}" alt="user avatar">
          </div>
          <p class="text-sm text-gray-800">
            <span class="font-bold">Beraadi Fouad</span>
            <br>
            <span>Co. Founder</span>
          </p>
        </div>
      </div>
    </div>

    {{-- white version --}}


  </section>



  <section class="py-32 bg-no-repeat bg-cover bg-center"
    style="background-image: url('{{asset('images/test.png')}}'); ">
    <div class="container mx-auto text-center px-6 md:px-0">
      <h3 class="title text-white">Pricing</h3>
      <h4 class="text-helper text-white">no extra charges for all features</h4>

      <div class="w-full md:w-1/3 m-auto shadow-lg bg-white rounded-lg p-8 mt-6">
        <div class="title">Discount price</div>
        <div class="text-6xl text-main">29.29</div>

        <div class="h-px bg-blue-300 my-4"></div>
        <ul class="mt-8">

          <li class="mt-3"> &bull; Feature</li>
          <li class="mt-3"> &bull; Feature</li>
          <li class="mt-3"> &bull; Feature</li>
          <li class="mt-3"> &bull; Feature</li>
          <li class="mt-3"> &bull; Feature</li>
          <li class="mt-3"> &bull; Feature</li>
          <li class="mt-3"> &bull; Feature</li>
          <li class="mt-3"> &bull; Feature</li>
          <li class="mt-3"> &bull; Feature</li>
          <li class="mt-3"> &bull; Feature</li>
        </ul>

        <a href="#" class="btn bg-cta mt-4">Start my free trail</a>

      </div>

    </div>


  </section>


  <section class="py-32">
    <h3 class="title text-center text-gray-800">the most frequent asked questions</h3>
  </section>




  <section class="py-32 bg-no-repeat bg-cover bg-center"
    style="background-image: url('{{asset('images/currve_bg.png')}}'); ">
    <div class="container mx-auto">
      <div class="md:flex items-center">

        <div class="md:w-1/2 p-6">
          <h3 class="title text-white">Simple Affordable, reliable </h3>
          <p class="main-text text-white mt-4">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam molestiae numquam voluptates ipsa dolor,
            tenetur ratione nesciunt veniam expedita saepe cumque quia culpa sit fuga suscipit reiciendis alias
            necessitatibus odit.
          </p>
        </div>

        <div class="md:w-1/2 p-6">
          <img src="{{ asset('images/schema.png') }}" alt="schema">
        </div>


      </div>
    </div>



  </section>



  <section class="py-32">
    <h3 class="title text-center text-gray-800">the most frequent asked questions</h3>

    <div class="w-2/3 mx-auto mt-6 p-8 shadow-lg">

      Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam, est? Nostrum, nesciunt? Reprehenderit modi
      temporibus corrupti placeat illum praesentium laudantium dicta neque, minima ratione aut beatae alias iusto, ut
      facere voluptates voluptatibus. Placeat molestias, unde consequatur quasi incidunt enim maiores.
    </div>

  </section>


  <footer>

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


</body>

</html>