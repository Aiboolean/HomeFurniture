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


    <section class="product-section layout_padding">
      <div class="container">
        <div class="heading_container heading_center mb-10">
          <h2>Shop by Category</h2>
        </div>

        @foreach($categories as $category)
        <div class="category_section">
          <h3>{{ $category->category_name }}</h3>
          <div class="row">

            @foreach($category->products as $product)
            <div class="col-12 col-md-4 col-lg-3 mb-5">
              <a class="product-item" href="{{url('product_details', $product->id)}}">
                <img src="products/{{$product->image}}" class="img-fluid product-thumbnail" alt="{{ $product->title }}">
                <h3 class="product-title">{{ $product->title }}</h3>
                <strong class="product-price">${{ $product->price }}</strong>

                <span class="icon-cross">
                  <img src="images/cross.svg" class="img-fluid" alt="Close">
                </span>
              </a>
            </div>
            @endforeach

          </div>
        </div>
        <hr>
        @endforeach
      </div>
    </section>



    @include('home.footer')

</body>

</html>