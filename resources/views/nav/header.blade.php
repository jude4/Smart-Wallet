<div class="w3l-bootstrap-header fixed-top">
    <nav class="navbar navbar-expand-lg navbar-light p-2">
      <div class="container">
        <a class="navbar-brand" href="index.html"><span class="fa fa-money"></span>Smart Wallet</a>
        <!-- if logo is image enable this
      <a class="navbar-brand" href="#index.html">
          <img src="image-path" alt="Your logo" title="Your logo" style="height:35px;" />
      </a> -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="{{ url('/') }}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/about-us') }}">About Us</a>
            </li>
          </ul>
          @guest
          <div class="form-inline">
            <a href="{{ route('login') }}" class="login mr-4">Log in</a>
            @if (Route::has('register'))
              <a href="{{ route('register') }}" class="btn btn-primary btn-theme">Create Free Account</a>
            @endif
            @else
            <a href="#" class="login mr-4 badge badge-danger text-white">{{auth()->user()->name}}</a>
            <a href="{{ url('/dashboard') }}" class="login mr-4">Dashboard</a>

            <a href="" class="btn btn-primary btn-theme"
            href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
            >Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            </div>
         @endguest
        </div>

      </div>
    </nav>
  </div>
