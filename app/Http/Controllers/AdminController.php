<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;

class AdminController extends Controller
{
    public function view_category(){
        $data = Category::all();
        return view('admin.category',compact('data'));
    }
    public function add_category(Request $request){
        $category = new Category;
        $category->category_name = $request->category;
        $category->save();
        toastr()->success('Category Added');
        return redirect()->back();
    }
    public function delete_category($id){
        $data = Category::find($id);
        $data->delete();
        toastr()->success('Category Deleted Succesfully');
        return redirect()->back();
    }
    public function edit_category($id){
        $data = Category::find($id); 
        return view('admin.edit_category',compact('data'));

    }
    public function update_category(Request $request,$id){
        $data = Category::find($id);
        $data-> category_name= $request->category;
        $data->save();
        toastr()->success('Category Updated');
        return redirect('/view_category');
    }
    public function add_product(){
        $category = Category::all();
        return view ('admin.add_product',compact('category'));
    }
    public function upload_product(Request $request){
        $data = new Product;
        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->quantity = $request->qty;
        $data->category = $request->category;
        $image = $request->image;
        if($image){
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('products', $imagename);
            $data->image = $imagename;
        }
        $data->save();
        toastr()->success('Product Added');
        return redirect()->back();
    }
    public function view_product(){
        $product = Product::paginate(5);
        return view('admin.view_product',compact('product'));
    }
    public function delete_product($id){
        $data = Product::find($id);
        $image_path = public_path('products/'.$data->image);
        if(file_exists($image_path)){
            unlink($image_path);
        }
        $data->delete();
        return redirect()->back();
    }
    public function update_product($id){
        $data = Product::find($id);
        $category = Category::all();
        return view('admin.update_product',compact('data','category'));
    }
    public function edit_product(Request $request,$id){
        $data = Product::find($id);
        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->quantity = $request->quantity;
        $data->category = $request->category;
        $image = $request->image;
        if($image){
            $imagename = time().'.'.$image->getCLientOriginalExtension();
            $request->image->move('products',$imagename);
            $data->image = $imagename;
        }
        $data->save();
        toastr()->success('Product Updated');
        return redirect('view_product');
    }
    public function view_order(){
        $pending_orders = Order::where('status', 'Pending')->orderBy('created_at', 'desc')->paginate(5, ['*'], 'pending_page');
        $shipped_orders = Order::where('status', 'On The way')->orderBy('created_at', 'desc')->paginate(5, ['*'], 'shipped_page');
        $delivered_orders = Order::where('status', 'Delivered')->orderBy('created_at', 'desc')->paginate(5, ['*'], 'delivered_page');
        $canceledOrders = Order::where('status', 'Canceled')->orderBy('created_at', 'desc')->paginate(5, ['*'], 'canceled');
        return view('admin.order', compact('pending_orders', 'shipped_orders', 'delivered_orders','canceledOrders'));
    }
    public function on_the_way($id){
        $data = Order::find($id);
        $data->status = 'On The way';
        $data->save();
        return redirect('/view_orders');
    }
    public function delivered($id){
        $data = Order::find($id);
        $data->status = 'Delivered';
        $data->save();
        return redirect('/view_orders');
    }
    //exportOrdersCSV function
    public function exportOrdersCSV()
{
    $fileName = 'orders.csv';
    $orders = Order::with('product')->get(); // Fetch orders with related product

    $headers = array(
        "Content-type"        => "text/csv",
        "Content-Disposition" => "attachment; filename=$fileName",
        "Pragma"              => "no-cache",
        "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
        "Expires"             => "0"
    );

    $columns = ['Order ID', 'Customer Name', 'Product Title', 'Quantity', 'Price', 'Status','Payment_Status', 'Address', 'Phone', 'Order Date'];

    $callback = function() use($orders, $columns) {
        $file = fopen('php://output', 'w');
        fputcsv($file, $columns);

        foreach ($orders as $order) {
            fputcsv($file, [
                $order->id,
                $order->name,
                $order->product->title,
                1, // Assuming quantity is always 1
                $order->product->price,
                $order->status,
                $order->rec_address,
                $order->payment_status, // Add payment_status here
                $order->phone,
                $order->created_at->format('Y-m-d')
            ]);
        }

        fclose($file);
    };

    return response()->stream($callback, 200, $headers);
}

}
