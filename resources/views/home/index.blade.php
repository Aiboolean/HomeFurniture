<!DOCTYPE html>
<html>

<head>
    @include ('home.style')
</head>

<body>
  <div class="hero_area">
    <!-- start header section -->
    @include('home.header')
  </div>
  <div class="slider_section mt-5">
    @include('home.slider')
  </div>
  <!-- shop section -->
    @include('home.product')
  <!-- end shop section -->


  <!-- info section -->

  @include('home.footer')

</body>

</html>