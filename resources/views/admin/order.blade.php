<!DOCTYPE html>
<html>
<head> 

    @include('admin.css')
<style type="text/css">
    table{
        border: 2px solid white;
        text-align: center;
    }
    th{
        padding: 7px;
        font-size: 18px;
        font-weight: bold;
        text-align: center;
        color: aliceblue;
    }
    .table-responsive{
        display: flex;
        justify-content: center;
        align-items: center;
    }
    td{
        color: white;
        padding: 10px;
        border: 1px solid white;
    }
    h2 {
        color: white;
        margin-top: 20px;
        text-align: center;
    }
    .pagination {
        justify-content: center;
        margin-top: 20px;
    }
</style>
</head>
<body>
    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h1>Orders</h1>
                
                <!-- Pending Orders Table -->
                <h2>Pending Orders</h2>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th>Customer Name</th>
                            <th>Product ID</th>
                            <th>Address</th>
                            <th>Phone No.</th>
                            <th>Product Title</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Payment Status</th>
                            <th>Update Status</th>
                        </tr>
                        @foreach ($pending_orders as $order)
                        <tr>
                            <td>{{ $order->name }}</td>
                            <td>{{ $order->product->id }}</td>
                            <td>{{ $order->rec_address }}</td>
                            <td>{{ $order->phone }}</td>
                            <td>{{ $order->product->title }}</td>
                            <td>{{ $order->product->price }}</td>
                            <td>{{ $order->status }}</td>
                            <td>{{ $order->payment_status }}</td>
                            <td>
                                <a class="btn btn-primary" href="{{ url('on_the_way', $order->id) }}">Mark as Shipped out</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                <!-- Pagination for Pending Orders -->
                <div class="pagination">
                    {{ $pending_orders->appends(['shipped_page' => request('shipped_page'), 'delivered_page' => request('delivered_page')])->links() }}
                </div>


                <!-- Shipped Orders Table -->
                <h2>Shipped out Orders</h2>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th>Customer Name</th>
                            <th>Product ID</th>
                            <th>Address</th>
                            <th>Phone No.</th>
                            <th>Product Title</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Payment Status</th>
                            <th>Update Status</th>
                        </tr>
                        @foreach ($shipped_orders as $order)
                        <tr>
                            <td>{{ $order->name }}</td>
                            <td>{{ $order->product->id }}</td>
                            <td>{{ $order->rec_address }}</td>
                            <td>{{ $order->phone }}</td>
                            <td>{{ $order->product->title }}</td>
                            <td>{{ $order->product->price }}</td>
                            <td>{{ $order->status }}</td>
                            <td>{{ $order->payment_status }}</td>
                            <td>
                                <a class="btn btn-success" href="{{ url('delivered', $order->id) }}">Mark as Delivered</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                <!-- Pagination for Shipped Orders -->
                <div class="pagination">
                    {{ $shipped_orders->appends(['pending_page' => request('pending_page'), 'delivered_page' => request('delivered_page')])->links() }}
                </div>


                <!-- Delivered Orders Table -->
                <h2>Delivered Orders</h2>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th>Customer Name</th>
                            <th>Product ID</th>
                            <th>Address</th>
                            <th>Phone No.</th>
                            <th>Product Title</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Payment Status</th>
                        </tr>
                        @foreach ($delivered_orders as $order)
                        <tr>
                            <td>{{ $order->name }}</td>
                            <td>{{ $order->product->id }}</td>
                            <td>{{ $order->rec_address }}</td>
                            <td>{{ $order->phone }}</td>
                            <td>{{ $order->product->title }}</td>
                            <td>{{ $order->product->price }}</td>
                            <td>{{ $order->status }}</td>
                            <td>{{ $order->payment_status }}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                <!-- Pagination for Delivered Orders -->
                <div class="pagination">
                    {{ $delivered_orders->appends(['pending_page' => request('pending_page'), 'shipped_page' => request('shipped_page')])->links() }}
                </div>


                <a href="{{ route('admin.export_orders_csv') }}" class="btn btn-info">Download CSV</a>
            </div>
        </div>
    </div>

    <!-- JavaScript files-->
    <script src="{{asset('admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('admincss/js/front.js')}}"></script>
  </body>
</html>