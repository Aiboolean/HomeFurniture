<section class="product-section">
  <div class="container">
    <div>
      <h2 class="mt-5">Latest Products</h2>
    </div>
    <div class="row">
      <div class="col-md-12 col-lg-3 mb-lg-0">
        <h2 class="section-title">Crafted with excellent material.</h2>
        <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus nostrum, officiis incidunt temporibus dolorem porro?</p>
        <p><a href="{{ url('shop') }}" class="btn">Explore</a></p>
      </div>
      @foreach ($product as $products)
      <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
        <a class="product-item" href="{{ url('product_details', $products->id) }}">
          <img src="products/{{$products->image}}" class="img-fluid product-thumbnail" alt="{{$products->title}}">
          <h3 class="product-title">{{$products->title}}</h3>
          <strong class="product-price">₱{{$products->price}}</strong>

          <span class="icon-cross">
            <img src="images/cross.svg" class="img-fluid" alt="cross icon">
          </span>
        </a>
      </div>
      @endforeach

    </div>
    <div class="pagination-wrapper">
      {{ $product->links() }}
    </div>
  </div>
</section>