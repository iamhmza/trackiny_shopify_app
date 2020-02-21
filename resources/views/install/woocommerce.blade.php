@extends('layouts.install')

@section('title', 'woocommerce')

@section('install')
<section class="install">
    <a class="logo" href="/dashboard">
        <img src="{{asset('images/logo.png')}}" alt="logo" />
    </a>

    <h2 class="title-2">Link account</h2>
    <img src="{{asset('images/wc_logo.png')}}" alt="paypal logo" />
    <p class="sub-text">
        <strong> Install Trackiny On : </strong>
        <br />Please log in to woocommerce dashboard and provide your API consumer key and secret here!
        <br />Need Help ? Click
        <a href="#" style="text-decoration: underline;">
            <b>the link</b>
        </a>
        to see Video!
    </p>
    <form action="{{url('/woocommerce/login')}}" method="post">
        {{csrf_field()}}
        @if($errors->get('storeName'))
            <ul style="color:red">
                @foreach ($errors->get('storeName') as $e)
                <li>{{$e}}</li>
                @endforeach
            </ul>
        @endif
        <input class="input" type="text" name="storeName" value="{{old('storeName')}}" placeholder="Store name" @if($errors->get('storeName')) has-error @endif  />
        
        @if($errors->get('consumerKey'))
            <ul style="color:red">
                @foreach ($errors->get('consumerKey') as $e)
                <li style="color:red">{{$e}}</li>
                @endforeach
            </ul>
           
        @endif
        <input class="input" type="text" name="consumerKey" value="{{old('consumerKey')}}"  @if($errors->get('consumerKey')) has-error @endif placeholder="Consumer key"  />
        
        @if($errors->get('ConsumerSecret'))
            <ul style="color:red">
                @foreach ($errors->get('ConsumerSecret') as $e)
                <li>{{$e}}</li>
                @endforeach
            </ul>
        @endif
        <input class="input" type="password" name="ConsumerSecret" 
        @if($errors->get('ConsumerSecret')) has-error @endif value="{{old('ConsumerSecret')}}"  placeholder="Consumer secret" />
        <button class="cta wc" type="submit">Install</button>
    </form>
</section>

<section class="hero">
    <!-- <img src="../../assets/hero_bg.svg" alt="t" /> -->

    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="1149.342" height="1042"
        viewBox="0 0 1149.342 1042">
        <defs>
            <linearGradient id="linear-gradient" x1="0.281" y1="0.283" x2="0.962" y2="0.931"
                gradientUnits="objectBoundingBox">
                <stop offset="0" stop-color="#945c87" />
                <stop offset="1" stop-color="#016fff" stop-opacity="0" />
            </linearGradient>
        </defs>
        <path id="Path_12" data-name="Path 12"
            d="M1149.342,324.018V686.5L766.22,654.539V1042h-383.1V425.052L0,387.138V0L766.245,121.72V267.678l.2.623Z"
            fill="url(#linear-gradient)" />
    </svg>
    <div class="hero_text">
        <h1 class="lg_text">Install our app in your Shopify store</h1>

        <p class="text">Log in to your Trackiny account to get back your tracks.</p>
    </div>
</section>
@endsection