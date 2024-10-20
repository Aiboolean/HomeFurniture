<!DOCTYPE html>
<html>

<head>
  @include('home.style') <!-- If you are including additional styles here -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
</head>

<body>
  <div>
    @include('home.header')
  </div>
  <div>
    @include('home.hero')
  </div>
  <div>
    @include('home.product')
  </div>
  <div>
    @include('home.footer')
  </div>

  <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>