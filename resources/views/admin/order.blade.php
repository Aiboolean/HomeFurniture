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
    .table_deg{
        display: flex;
        justify-content: center;
        align-items: center;
    }
    td{
        color: white;
        padding: 10px;
        border: 1px solid white;
    }
</style>
</head>
<body>

    @include('admin.header')

    @include('admin.sidebar')
    <!-- Sidebar Navigation end-->
    <div class="page-content">
        <div class="page-header">
        <div class="container-fluid">
            <h1>Orders</h1>
        <div class="table_deg">
        
        <table>
            <tr>
                <th>Customer name</th>
                <th>Product ID</th>
                <th>Address</th>
                <th>Phone no.</th>
                <th>product title</th>
                <th>price</th>
                <th>Status</th>
                <th>Payment status</th>
                <th>Update Status</th>
            </tr>
            @foreach ($data as $data)

            <tr>
                <td>{{$data->name}}</td>
                <td>{{$data->product->id}}</td>
                <td>{{$data->rec_address}}</td>
                <td>{{$data->phone}}</td>
                <td>{{$data->product->title}}</td>
                <td>{{$data->product->price}}</td>
                <td>{{$data->status}}</td>
                <td>{{$data->payment_status}}</td>
                <td>
                    <a class="btn btn-primary" href="{{url('on_the_way', $data->id)}}">On the way</a>
                    <a class="btn btn-success" href="{{url('delivered', $data->id)}}">Delivered</a>
                </td>
            </tr>
            @endforeach
        </table>
        </div>
        <a href="{{ route('admin.export_orders_csv') }}" class="btn btn-info">Download CSV</a>
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