@extends('layouts.install')

@section('title', 'paypal')

@section('install')
<main class="auth">
    <section class="doorway">
        {{-- layer_1 --}}
        <div class="absolute inset-0 md:-ml-8 z-0">
            <svg class="fill-current w-full h-full" viewbox="0 0 1149.342 1042" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <defs>
                    <lineargradient gradientunits="objectBoundingBox" id="linear-gradient" x1="0.281" x2="0.962" y1="0.283" y2="0.931">
                        <stop offset="0" stop-color="#263b80">
                        </stop>
                        <stop offset="1" stop-color="#016fff" stop-opacity="0">
                        </stop>
                    </lineargradient>
                </defs>
                <g data-name="Layer 2" id="Layer_2" transform="translate(0 55.092)">
                    <g data-name="Layer 1" id="Layer_1" transform="translate(0 -55.092)">
                        <path d="M1149.342,324.018V686.5L766.22,654.539V1042h-383.1V425.052L0,387.138V0L766.245,121.72V267.678l.2.623Z" data-name="Path 12" fill="url(#linear-gradient)" id="Path_12">
                        </path>
                    </g>
                </g>
            </svg>
        </div>
        {{-- layer_2 --}}
        <div class="absolute inset-0 left-8 z-10">
            <a class="w-40 mx-auto block md:hidden mt-8" href="/dashboard">
                <img alt="logo" class="w-full" src="{{asset('images/logo_w.png')}}"/>
            </a>
            <div class="w-4/5 text-center mt-8 mx-auto md:text-left md:mt-48">
                <h1 class="text-2xl font-bold text-white capitalize md:text-5xl">
                    Install our app in your Shopify
                    store
                </h1>
                <p class="main-text text-white mt-2">
                    Log in to your Trackiny account to get back your tracks.
                </p>
            </div>
        </div>
    </section>
    <section class="door">
        <a class="w-32 mx-auto hidden md:block md:mx-0 md:my-16" href="/dashboard">
            <img alt="logo" class="w-full" src="{{asset('images/logo.png')}}"/>
        </a>
        <h2 class="title-helper my-5">
            Link account
        </h2>
        <div class="w-48 mx-auto md:w-56 md:mx-0 mt-8">
            <img alt="shopify logo" src="{{asset('images/paypal.png')}}"/>
        </div>
        <p class="main-text mt-6">
            <strong>
                Install Trackiny On :
            </strong>
            <br/>
            Please log in to woocommerce dashboard and provide your API consumer key and secret here!
            <br/>
            Need Help ? Click
            <a href="#" style="text-decoration: underline;">
                <b>
                    the link
                </b>
            </a>
            to see Video!
        </p>
        @if (session('error'))
    <div class="alert danger">
        {{ session('error') }}
    </div>
    @endif
    @error('paypalClientId')
    <div class="alert danger">
        {{ $message }}
    </div>
    @enderror
    @error('paypalSecret')
    <div class="alert danger">
        {{ $message }}
    </div>
    @enderror
        <form action="{{url('/paypal/login')}}" method="get">
            {{csrf_field()}}
            <input class="block border border-gray-400 w-64 rounded text-sm p-3 mx-auto md:mx-0 mt-4" name="paypalClientId" placeholder="API key" type="text"/>
            <input class="block border border-gray-400 w-64 rounded text-sm p-3 mx-auto md:mx-0 mt-4" name="paypalSecret" placeholder="API secret" type="text"/>
            <button class="btn bg-paypal mt-4" type="submit">
                Install
            </button>
        </form>
    </section>
</main>

@endsection
