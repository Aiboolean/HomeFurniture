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
            border: 1px solid black;
            padding: 5px;
        }
        .pagination{
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
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
        <th>Action</th>
    </tr>
    @foreach ($order as $orderItem)  <!-- Changed from $order to $orderItem to avoid naming conflict -->
    <tr>
        <td>{{ $orderItem->product->title }}</td>
        <td>{{ $orderItem->product->price }}</td>
        <td>{{ $orderItem->status }}</td>
        <td>
            <img width="200" src="products/{{ $orderItem->product->image }}">
        </td>
        <td>
            @if($orderItem->status == 'Pending')
            <form action="{{ route('cancel_order', $orderItem->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">Cancel Order</button>
            </form>
            @else
            <button type="button" class="btn btn-secondary" disabled>Cannot Cancel</button>
            @endif
        </td>
    </tr>
    @endforeach
</table>



    </div>
    <!-- Pagination Links -->
    <div class="pagination">
        {{ $order->links() }}
    </div>
</div>


@include('home.footer')

</body>

</html>