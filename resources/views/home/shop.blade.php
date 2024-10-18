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


<section class="shop_section layout_padding">
  <div class="container">
    <div class="heading_container heading_center">
      <h2>Shop by Category</h2>
    </div>

    @foreach($categories as $category)
    <div class="category_section">
        <h3>{{ $category->category_name }}</h3>
        <div class="row">
        @foreach($category->products as $product)
        <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="box">
            <a href="">
                <div class="img-box">
                <img src="products/{{$product->image}}" alt="">
                </div>
                <div class="detail-box">
                <h6>{{ $product->title }}</h6>
                <h6>
                    Price
                    <span>${{ $product->price }}</span>
                </h6>
                </div>
                <div>
                <!-- Details button -->
                <a class="custom-details-btn" href="{{url('product_details', $product->id)}}">Details</a>

                <!-- Add to Cart button -->
                <a class="custom-add-btn" href="{{url('add_cart', $product->id)}}">Add to Cart</a>
                </div>
            </a>
            </div>
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