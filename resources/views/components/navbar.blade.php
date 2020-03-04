<div class="container m-auto px-6 md:px-0">
  <nav class="flex justify-between items-center py-8">
    <a id="logo" class="w-32 -mt-1" href="/">
      {{ $slot }}
    </a>

    <ul class="hidden lg:flex">
      <li><a class="link hover:underline" href="#features">Features</a></li>
      <li><a class="link hover:underline" href="#why">Why Trackiny</a></li>
      <li><a class="link hover:underline" href="#pricing">Pricing</a></li>
      <li><a class="link hover:underline" href="#">Support</a></li>
      <li><a class="link hover:underline" href="#faq">FAQ</a></li>
    </ul>

    @auth
    <div>
      <a href="/me/logout" class="hidden md:inline-block link hover:underline">Logout</a>
      <a href="/dashboard" class="btn bg-cta-main hover:bg-cta-lighter">Go to dashboard</a>
    </div>
    @endauth

    @guest
    <div>
      <a href="#" class="hidden md:inline-block link hover:underline">Login</a>
      <a href="#" class="hidden md:inline-block btn bg-secondary-main hover:bg-secondary-lighter">Sign In</a>
      <a href="/install/choose" class="btn bg-cta-main hover:bg-cta-lighter">Start free now</a>
    </div>
    @endguest

  </nav>
</div>