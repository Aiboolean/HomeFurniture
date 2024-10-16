<!DOCTYPE html>
<html>

<head>
    @include ('home.style')
    <style type="text/css">
        .div_center{
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 60px;
        }
        table{
            border: 2px solid black;
            text-align: center;
            width: 800px;
        }
        th{
            border: 1px solid white;
            background-color: black;
            color: white;
            font-size: 18px;
            font-weight: bold;
            text-align: center;
        }
        td{
            border: 2px solid black;
            padding: 5px;
        }
    </style>
</head>

<body>
<div class="hero_area">
    <!-- start header section -->
    @include('home.header')
    <!-- end header section -->
    <div class="div_center">
        <table>
            <tr>
                <th>Product name</th>
                <th>Price</th>
                <th>Delivery status</th>
                <th>Product</th>
            </tr>
            @foreach ($order as $order)
            <tr>
                <td>{{$order->product->title}}</td>
                <td>{{$order->product->price}}</td>
                <td>{{$order->status}}</td>
                <td>
                    <img width="200" src="products/{{$order->product->image}}">
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>


@include('home.footer')

</body>

</html>