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
  </div>

<!--product details-->
<section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Product Detail
        </h2>
      </div>
      <div class="row">

        <div class="card mb-9" style="max-width: 7000px;">
    <div class="row g-0">
        <div class="col-md-4">
        <img src="/products/{{$data->image}}" class="img-fluid rounded-start" alt="">
        </div>
        <div class="col-md-8">
        <div class="card-body">
            <h5 class="card-title">{{$data->title}}</h5>
            <p class="card-text">{{$data->description}}</p>
            <p class="card-text">Category : {{$data->category}}</p>
            <p class="card-text">₱{{$data->price}}</p>
            <p class="card-text"><small class="text-body-secondary">In Stock : {{$data->quantity}}</small></p>
        </div>
        </div>
    </div>
    </div>
        
        <!--<div class="col-md-10">
        <div class="box">
            <a href="">
            <div class="img-box">
                <img width="400" src="/products/{{$data->image}}" alt="">
            </div>
            <div class="detail-box">
                <h6>
                {{$data->title}}
                </h6>
                <h6>
                Price
                <span>
                    ${{$data->price}}
                </span>
                </h6>
            </div>
            
            </a>
          </div>
        </div>-->

      </div>
    </div>
  </section>

<!--product details-->


   

  <!-- info section -->

  @include('home.footer')

</body>

</html>