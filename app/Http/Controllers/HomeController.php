<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Category;
use Session;
use Stripe;
class HomeController extends Controller
{
    public function index(){
        $user = User::where('usertype','user')->get()->count();
        $product = Product::all()->count();
        $order = Order::all()->count();
        $delivered = Order::where('status','Delivered')->get()->count();

         // New metrics
        $paidByCard = Order::where('payment_status', 'Paid')->count(); // Users who paid via card
        $cashOnDelivery = Order::where('payment_status', 'Cash on Delivery')->count(); // Users who chose cash on delivery
        $canceled = Order::where('status', 'Canceled')->count(); // Canceled orders
        return view ('admin.index',compact('user','product','order','delivered','paidByCard', 'cashOnDelivery','canceled'));
    }

    public function home (){
        $product = Product::paginate(8);
        if(Auth::id()){
            $user = Auth::user();
        $userid = $user->id;
        $count = Cart::where('user_id',$userid)->count();
        }
        else{
            $count = '';
        }
        return view ('home.index', compact('product','count'));
    }
    public function login_home(){
        $product = Product::paginate(8);
        if(Auth::id()){
            $user = Auth::user();
        $userid = $user->id;
        $count = Cart::where('user_id',$userid)->count();
        }
        else{
            $count = '';
        }
        return view ('home.index', compact('product','count'));
    }
    public function product_details($id){
        $data = Product::find($id);
        if(Auth::id()){
            $user = Auth::user();
        $userid = $user->id;
        $count = Cart::where('user_id',$userid)->count();
        }
        else{
            $count = '';
        }
        return view('home.product_details', compact('data','count'));
    }
    public function add_cart($id){
        $product_id = $id;
        $user = Auth::user();
        $user_id = $user->id;
        $data = new Cart;
        $data->user_id = $user_id;
        $data->product_id = $product_id;
        $data->save();
        return redirect()->back();
    }
    public function mycart(){
        if(Auth::id()){
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id',$userid)->count();
            $cart = Cart::where('user_id',$userid)->get();
        }
        return view('home.mycart',compact('count','cart'));
    }
    public function remove_cart($id)
    {
        $cartItem = Cart::find($id);

        if ($cartItem) {
            $cartItem->delete();
        }

        return redirect()->back()->with('success', 'Item removed from cart');
    }
    public function confirm_order(Request $request){
        $name = $request->name;
        $address = $request->address;
        $phone = $request->phone;
        $userid = Auth::user()->id;
        $cart = Cart::where('user_id', $userid)->get();
        foreach($cart as $carts){
            $order = new Order;
            $order->name = $name;
            $order->rec_address = $address;
            $order->phone = $phone;
            $order->user_id = $userid;
            $order->product_id = $carts->product_id;
            $order->status = 'Pending';  // Make sure to set this explicitly
            $order->save();

            
        }
        $cart_remove = Cart::where('user_id', $userid)->get();
        foreach($cart_remove as $remove){
            $data = Cart::find($remove->id);
            $data->delete();
        }
        
        return redirect()->back();
    }
    public function myorders(){
        $user = Auth::user()->id;
        $count = Cart::where('user_id', $user)->get()->count();
        // Get orders with the most recent first, paginate results (e.g., 10 per page)
        $order = Order::where('user_id', $user)->orderBy('created_at', 'desc')->paginate(5); 
        return view('home.order', compact('count', 'order'));
    }
    public function stripe($value)
    {
        return view('home.stripe',compact('value'));
    }
    public function stripePost(Request $request,$value)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
                "amount" => $value * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment Complete." 
        ]);

        $name = Auth::user()->name;
        $phone = Auth::user()->phone;
        $address = Auth::user()->address;
        $userid = Auth::user()->id;
        $cart = Cart::where('user_id', $userid)->get();
        foreach($cart as $carts){
            $order = new Order;
            $order->name = $name;
            $order->rec_address = $address;
            $order->phone = $phone;
            $order->user_id = $userid;
            $order->product_id = $carts->product_id;
            $order->payment_status = "paid";
            $order->status = 'Pending';  // Ensure status is set here as well
            $order->save();
            
        }
        $cart_remove = Cart::where('user_id', $userid)->get();
        foreach($cart_remove as $remove){
            $data = Cart::find($remove->id);
            $data->delete();
    }
    return redirect('mycart');
}
    public function cancel_order($id)// Cancel order function
    {
        $order = Order::find($id);

        if ($order && $order->status == 'Pending') {  // Checking if the status is still "Pending"
            $order->status = 'Canceled';
            $order->save();

            return redirect()->back()->with('success', 'Order canceled successfully.');
        }

        return redirect()->back()->with('error', 'Order cannot be canceled as it has been processed.');
    }
    public function shop() {
        // Get all categories with their related products
        $categories = Category::with('products')->get();
    
        if (Auth::id()) {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();
        } else {
            $count = '';
        }
    
        return view('home.shop', compact('categories', 'count'));
    }
    

}
