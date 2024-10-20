<!DOCTYPE html>
<html>

<head>
    @include('home.style')
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

                <!-- Dropdown to filter by category -->
                <form method="GET" action="{{ url('shop') }}">
                    <select name="category_name" onchange="this.form.submit()">
                        <option value="">All Categories</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->category_name }}" {{ request('category_name') == $category->category_name ? 'selected' : '' }}>
                                {{ $category->category_name }}
                            </option>
                        @endforeach
                    </select>
                </form>

                <div class="row">
                    @if($products->isEmpty())
                        <div class="col-12 text-center">
                            <h3>No products found for this category.</h3>
                        </div>
                    @else
                        @foreach($products as $product)
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="box">
                                <a href="{{ url('product_details', $product->id) }}">
                                    <div class="img-box">
                                        <img src="{{ asset('products/' . $product->image) }}" alt="{{ $product->title }}">
                                    </div>
                                    <div class="detail-box">
                                        <h6>{{ $product->title }}</h6>
                                        <h6>
                                            Price
                                            <span>${{ $product->price }}</span>
                                        </h6>
                                    </div>
                                    <div>
                                        <!-- Add to Cart button -->
                                        <a class="custom-add-btn" href="{{ url('add_cart', $product->id) }}">Add to Cart</a>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </section>

        @include('home.footer')
    </div>
</body>

</html>
