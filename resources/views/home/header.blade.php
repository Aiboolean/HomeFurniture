<!-- header section strats -->
<header class="header_section">
      <!--<nav class="navbar navbar-expand-lg custom_nav-container ">
        <a class="navbar-brand" href="{{url('/')}}">
          <span>
            Home Furniture
          </span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav">
            
            <li class="nav-item">
              <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('/shop')}}">Shop</a>
            </li>
          </ul>
          <div class="user_option">

            @if (Route::has('login'))
            @auth 

            <a href="{{url('myorders')}}">My Orders</a>

            <a href="{{url('mycart')}}">
              <i class="fa fa-shopping-bag" aria-hidden="true"></i>
              [{{$count}}]
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="text-decoration: none; color: inherit;">
                <i class="fa fa-user" aria-hidden="true"></i>
                <span>Logout</span>
            </a>


            @else

            <a href="{{url('/login')}}">
              <i class="fa fa-user" aria-hidden="true"></i>
              <span>
                Login
              </span>
            </a>
            <a href="{{url('/register')}}">
              <i class="fa fa-vcard" aria-hidden="true"></i>
              <span>
                Register
              </span>
            </a>
          @endauth
          @endif

            
            
          </div>
        </div>
      </nav>-->
      <nav class="navbar navbar-expand-lg fixed-top bg-body-tertiary">
  <div class="container-fluid custom-navbar">
    <a class="navbar-brand" href="{{url('/')}}">HomeFurniture</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="{{url('/')}}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('/shop')}}">Shop</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About Us</a>
        </li>

        <!-- Authentication Links -->
        @if (Route::has('login'))
        @auth
        <li class="nav-item">
          <a class="nav-link" href="{{url('myorders')}}">My Orders</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('mycart')}}">
            <i class="fa fa-shopping-bag" aria-hidden="true"></i> [{{$count}}]
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fa fa-user" aria-hidden="true"></i> Logout
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
        </li>
        @else
        <li class="nav-item">
          <a class="nav-link" href="{{url('/login')}}">
            <i class="fa fa-user" aria-hidden="true"></i> Login
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('/register')}}">
            <i class="fa fa-vcard" aria-hidden="true"></i> Register
          </a>
        </li>
        @endauth
        @endif
      </ul>
    </div>
  </div>
</nav>

    </header>