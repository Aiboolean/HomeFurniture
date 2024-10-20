<header>
  <nav class="custom-navbar navbar navbar-expand-md navbar-dark bg-dark" aria-label="HomeFurniture navigation bar">
    <div class="container">
      <a href="{{ url('/') }}" class="navbar-brand">Home<span>Furniture</span></a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsHomeFurniture" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsHomeFurniture">
        <ul class="navbar-nav ms-auto mb-2 mb-md-0">
          <li class="nav-item active">
            <a href="{{ url('/') }}" class="nav-link">Home</a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/shop') }}" class="nav-link">Shop</a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/about-us') }}" class="nav-link">About Us</a>
          </li>
        </ul>

        <ul class="navbar-nav mb-2 mb-md-0 ms-5">
          <li class="nav-item">
            <a href="{{ url('/profile') }}" class="nav-link"><img src="{{ asset('images/user.svg') }}" alt="User"></a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/mycart') }}" class="nav-link"><img src="{{ asset('images/cart.svg') }}" alt="Cart"></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>