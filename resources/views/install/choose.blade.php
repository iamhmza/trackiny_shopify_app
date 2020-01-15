@extends('layouts.install')

@section('title', 'paypal')

@section('install')

<section class="install">
  <a class="logo" href="/dashboard">
    <img src="{{asset('images/logo.png')}}" alt="logo" />
  </a>

  <h2 class="title-2">Choose plateform</h2>
  <div class="box">

    <a href="{{url('/install/shopify')}}">
      <img src="{{asset('images/shopify.png')}}" alt="shopify logo" />
    </a>
  </div>

  <div class="box">
    <a href="/install/woocommerce">

      <img src="{{asset('images/wc_logo.png')}}" alt="woocommerce logo" />

    </a>
  </div>

  <button class="cta paypal" type="submit">Choose</button>
</section>

<section class="hero">
  <!-- <img src="../../assets/hero_bg.svg" alt="t" /> -->
  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="1149.342" height="1042"
    viewBox="0 0 1149.342 1042">
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



  <div class="hero_text">
    <h1 class="lg_text">Install our app in your Shopify store</h1>

    <p class="text">Log in to your Trackiny account to get back your tracks.</p>
  </div>
</section>

@endsection