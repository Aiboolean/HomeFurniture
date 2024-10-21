<!DOCTYPE html>
<html>

<head>
    @include('home.style')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
</head>

<body>
    <div class="hero_area">
        <!-- start header section -->
        @include('home.header')
        <!-- end header section -->

        <section class="product-section">
            <div class="container">
                <div class="heading_container heading_center">
                    <h2>Shop by Category</h2>
                </div>

                <!-- Dropdown to filter by category -->
                <form method="GET" action="{{ url('shop') }}" class="form-inline mb-3">
    <div class="form-group">
        <label for="category-select" class="mr-2">Filter by Category:</label>
        <select name="category_name" id="category-select" class="form-control custom-select" onchange="this.form.submit()">
            <option value="">All Categories</option>
            @foreach($categories as $category)
                <option value="{{ $category->category_name }}" {{ request('category_name') == $category->category_name ? 'selected' : '' }}>
                    {{ $category->category_name }}
                </option>
            @endforeach
        </select>
    </div>
</form>


                <div class="row">
                    @if($products->isEmpty())
                        <div class="col-12 text-center">
                            <h3>No products found for this category.</h3>
                        </div>
                    @else
                        @foreach($products as $product)
                        <div style="padding-top: 40px;" class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
                            <a class="product-item" href="{{ url('product_details', $product->id) }}">
                            <img src="products/{{$product->image}}" class="img-fluid product-thumbnail" alt="{{$product->title}}">
                            <h3 class="product-title">{{$product->title}}</h3>
                            <strong class="product-price">₱{{$product->price}}</strong>

                            <span class="icon-cross">
                                <img src="images/cross.svg" class="img-fluid" alt="cross icon">
                            </span>
                            </a>
                        </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </section>

        @include('home.footer')
    </div>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
