@extends('layouts.install')

@section('title', 'paypal')

@section('install')

<main class="auth">
  <section class="doorway">
    {{-- layer_1 --}}
    <div class="absolute inset-0 md:-ml-8 z-0">
      <svg class="fill-current w-full h-full" xmlns="http://www.w3.org/2000/svg"
        xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1149.342 1042">
        <defs>
          <linearGradient id="linear-gradient" x1="0.957" y1="0.485" x2="0.198" y2="0.299"
            gradientUnits="objectBoundingBox">
            <stop offset="0" stop-color="#0172ff" stop-opacity="0" />
            <stop offset="1" stop-color="#364fcc" />
          </linearGradient>
        </defs>
        <g id="Layer_2" data-name="Layer 2" transform="translate(0 55.092)">
          <g id="Layer_1" data-name="Layer 1" transform="translate(0 -55.092)">
            <path id="Path_12" data-name="Path 12"
              d="M1149.342,324.018V686.5L766.22,654.539V1042h-383.1V425.052L0,387.138V0L766.245,121.72V267.678l.2.623Z"
              fill="url(#linear-gradient)" />
          </g>
        </g>
      </svg>
    </div>

    {{-- layer_2 --}}
    <div class="absolute inset-0 z-10">
      <a class="w-40 mx-auto block md:hidden mt-8" href="/dashboard">
        <img class="w-full" src="{{asset('images/logo_w.png')}}" alt="logo" />
      </a>

      <div class="w-4/5 text-center mt-8 mx-auto md:text-left md:mt-48">
        <h1 class="text-2xl font-bold text-white capitalize md:text-5xl">Install our app in your Shopify store</h1>
        <p class="main-text text-white mt-2">Log in to your Trackiny account to get back your tracks.</p>
      </div>
    </div>

  </section>

  <section class="door">
    <a class="w-32 mx-auto hidden md:block md:mx-0 md:my-16" href="/dashboard">
      <img class="w-full" src="{{asset('images/logo.png')}}" alt="logo" />
    </a>

    <h2 class="title-helper my-5">Choose plateform</h2>
    <div class="w-48 mx-auto md:w-56 md:mx-0 mt-12 opacity-25 hover:opacity-100 transition">
      <a href="/install/shopify">
        <img src="{{asset('images/shopify.png')}}" alt="shopify logo" />
      </a>
    </div>

    <div class="w-48 mx-auto md:w-56 md:mx-0 mt-12 opacity-25 hover:opacity-100 transition">
      <a href="/install/woocommerce">
        <img src="{{asset('images/wc_logo.png')}}" alt="woocommerce logo" />
      </a>
    </div>

  </section>

</main>



@endsection