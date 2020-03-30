@extends('layouts.page')

@section('plugins')
<link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
@endsection

@section('main')
@component('components.navbar')
<img class="w-full" src="./images/logo.png" alt="trackiny logo">
@endcomponent
<div class="container m-auto my-16 px-6 md:px-0 text-center">
  <h1 class="font-body font-bold text-3xl leading-tight capitalize">We are here to help</h1>
  <h4 class="main-text mt-4">Whether you have questions or you would just like to say hello, contact us.</h4>
</div>

<main class="py-8 bg-no-repeat bg-cover" style="background-image:url('{{asset('/images/contact.svg')}}')">

  <form action="">
    <div class="container m-auto my-16 px-6 md:px-0 text-center">

      <div class="md:flex justify-around flex-wrap text-left">
        <div class="md:w-5/12 mt-8">
          <label class="main-text text-white" for="name">Name</label>
          <input class="w-full block border border-gray-400  text-sm p-2 mx-auto md:mx-0" type="text" name="name"
            placeholder="name...">
        </div>
        <div class="md:w-5/12 mt-8">
          <label class="main-text text-white" for="email">Email</label>
          <input class="w-full block border border-gray-400  text-sm p-2 mx-auto md:mx-0" type="email" name="email"
            placeholder="mymail@example.com...">
        </div>
        <div class="md:w-11/12 mt-8">
          <label class="main-text text-white" for="subject">Subject</label>
          <input class="w-full block border border-gray-400  text-sm p-2 mx-auto md:mx-0" type="text" name="subject"
            placeholder="subject...">
        </div>
        <div class="md:w-5/12 mt-8">
          <label class="main-text text-white" for="message">Message</label>
          <textarea class="w-full block border border-gray-400 text-sm p-2 mx-auto md:mx-0 h-48" name="message"
            placeholder="message..."></textarea>
        </div>
        <div class="md:w-5/12 mt-8 flex flex-col">
          <label class="main-text text-white" for="name">Upload image</label>
          <div class="flex items-center mt-4">
            <div class="w-12 h-12 bg-white flex justify-center items-center font-bold text-2xl shadow rounded mr-4">
              <span class="lnr lnr-picture text-blue-500"></span>
            </div>
            <div class="w-12 h-12 bg-white flex justify-center items-center font-bold text-2xl shadow rounded mr-4">
              <span class="lnr lnr-plus-circle"></span>
            </div>
            <div class="w-12 h-12 bg-white flex justify-center items-center font-bold text-2xl shadow rounded mr-4">
              <span class="lnr lnr-plus-circle"></span>
            </div>
            <div class="w-12 h-12 bg-white flex justify-center items-center font-bold text-2xl shadow rounded mr-4">
              <span class="lnr lnr-plus-circle"></span>
            </div>
          </div>

          <button class="btn w-40 mt-20 ml-auto bg-cta-main hover:bg-cta-lighter" type="submit">
            Submit
          </button>
        </div>
      </div>
  </form>
</main>
@endsection