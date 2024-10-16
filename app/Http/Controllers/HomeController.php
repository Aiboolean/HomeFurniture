<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use App\Models\Order;
class HomeController extends Controller
{
    public function index(){
        $user = User::where('usertype','user')->get()->count();
        $product = Product::all()->count();
        $order = Order::all()->count();
        $delivered = Order::where('status','Delivered')->get()->count();
        return view ('admin.index',compact('user','product','order','delivered'));
    }

    public function home (){
        $product = Product::all();
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
        $product = Product::all();
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
        $count = Cart::where('user_id',$user)->get()->count();
        $order = Order::where('user_id',$user)->get();
        return view('home.order',compact('count','order'));
    }
}
