<!DOCTYPE html>
<html>

<head>
    <style>
        .div_deg{
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 60px;
        }
        table{
            border-collapse:separate;
            border:solid black 1px;
            border-radius:6px;
            text-align: center;
            width: 800px;
            
        }
        th{
            
            border-left: solid black 1px;
            border-top: solid black 1px;
            text-align: center;
            color: white;
            font: 20px;
            font-weight: bold;
            background-color: rgb(127, 99, 71);
        }
        td{
            
            border-left: solid black 1px;
            border-top: solid black 1px;
        }
        .cart_value{
            text-align: center;
            margin-bottom: 70px;
            padding: 18px;
        }
        .order_deg{
            display: flex;
            justify-content: center;
            align-items: center;
            padding-right: 100px;
            margin-top: 100px;
        }
        label{
            display: inline-block;
            width: 150px;
        }
        .div_gap{
            padding: 20px;
        }
    </style>
    @include ('home.style')

</head>

<body>
<div class="hero_area">
    <!-- start header section -->
    @include('home.header')
    <!-- end header section -->
</div>
    <div class="div_deg">
        
        <table>
            <tr>
                <th>Product title</th>
                <th>Price</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
            <?php
            $value=0;
            ?>
            @foreach ($cart as $cart)
            <tr>
                <td>{{$cart->product->title}}</td>
                <td>₱{{$cart->product->price}}</td>
                <td>
                    <img width="150" src="/products/{{$cart->product->image}}">
                </td>
                <td>
                <!-- Remove Button Form -->
                <form action="{{ url('/remove_cart', $cart->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Remove</button>
                </form>
            </td>
            </tr>
            <?php
            $value = $value + $cart->product->price;
            ?>
            @endforeach
        </table>
    </div>
    <div class="cart_value">
        <h3>Total Value of cart is : ₱{{$value}}</h3>
    </div>

    <div class="order_deg">
            <form action="{{url('confirm_order')}}" method="Post">
                @csrf
                <div class="div_gap">
                    <label>Receiver Name</label>
                    <input type="text" name="name" value="{{Auth::user()->name}}">
                </div>
                <div class="div_gap">
                    <label>Receiver Address</label>
                    <textarea name="address"> {{Auth::user()->address}}</textarea>
                </div>
                <div class="div_gap">
                    <label>Receiver Phone No.</label>
                    <input type="text" name="phone" value="{{Auth::user()->phone}}">
                </div>
                <div class="div_gap">
                    <input class="btn btn-primary" type="submit" value="Cash on Delivery">
                    <a class="btn btn-info" href="{{url('stripe',$value)}}">Pay with card</a>
                </div>
            </form>
        </div>


<!-- info section -->

@include('home.footer')

</body>

</html>