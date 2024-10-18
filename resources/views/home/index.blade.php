<!DOCTYPE html>
<html>

<head>
    @include ('home.style')
</head>

<body>
  <div class="hero_area">
    <!-- start header section -->
     @include('home.header')
    <!-- end header section -->
    <!-- slider section -->
    @include('home.slider')
    <!-- end slider section -->
  </div>
  <!-- end hero area -->

  <!-- shop section -->
    @include('home.product')
  <!-- end shop section -->


  <!-- info section -->

  @include('home.footer')

</body>

</html>