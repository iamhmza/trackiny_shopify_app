@extends('layouts.install')

@section('title', 'shopify')

@section('install')

<section class="install">
    <a class="logo" href="/dashboard">
        <img src="{{asset('images/logo.png')}}" alt="logo" />
    </a>

    <h2 class="title-2">Installation</h2>
    <img src="{{asset('images/shopify.png')}}" alt="shopify logo" />
    <p class="sub-text">
        Authenticate to your store by typing the name of the store .
        <br />you will be redirected to shopify for the authentication proccess.
    </p>
    @error('name')
    <div class="alert danger">{{ $message }}</div>
    @enderror
    <form action="{{url('/shopify/login')}}" method="post">
        {{csrf_field()}}
        <input class="input" type="text" placeholder="Store name" name="name" />
        <button class="cta shopify " type="submit">Install</button>
    </form>
</section>

<section class="hero">
    <!-- <img src="../../assets/hero_bg.svg" alt="t" /> -->

    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="1149.342" height="1042"
        viewBox="0 0 1149.342 1042" :class="color">
        <defs>
            <linearGradient id="a" x1="0.281" y1="0.283" x2="0.962" y2="0.931" gradientUnits="objectBoundingBox">
                <stop offset="0" stop-color="#95bf47" />
                <stop offset="1" stop-color="#016fff" stop-opacity="0" />
            </linearGradient>
        </defs>
        <g transform="translate(0 55.092)">
            <g transform="translate(0 -55.092)">
                <path
                    d="M1149.342,324.018V686.5L766.22,654.539V1042h-383.1V425.052L0,387.138V0L766.245,121.72V267.678l.2.623Z"
                    fill="url(#a)" />
            </g>
        </g>
    </svg>

    <div class="hero_text">
        <h1 class="lg_text">Install our app in your Shopify store</h1>

        <p class="text">Log in to your Trackiny account to get back your tracks.</p>
    </div>
</section>

@endsection