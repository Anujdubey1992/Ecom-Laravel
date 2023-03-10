<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Session;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    function index()
    {
        $data=Product::all();
        return  view('product',['products'=>$data]);
    }
    ///////////////////////////////////////
    function details($id)
    {
        $data= Product::find($id);
        return view("details",['data'=>$data]);
    }
    /////////////////////////////////////////
    function search(Request $req)
    {
        $data= Product::
        where('name','like','%'.$req->input('query').'%')
        ->get();
        return view("details",['data'=>$data]);
    }
    ///////////////////////////////////////
    function addToCart(Request $req)
    {
        if($req->session()->has('user'))
        {
            
            $cart= new Cart;
            $cart->user_id=$req->session()->get('user')['id'];
            $cart->product_id=$req->product_id;
            $cart->save();
            return redirect('/');
        }
        else
        {
            return redirect('/login');
        }
    }
    //////////////////////////////////////////
    static function cartItem()
    {
        $Usrid=Session::get('user')['id'];
        return Cart::where('user_id',$Usrid)->count();
    }
    /////////////////////////////////////////
    function cartList()
    {
        $userId=Session::get('user')['id'];
        $products=DB::table('carts')
        ->join('products','carts.product_id','=','products.id')
        ->where('carts.user_id',$userId)
        ->select('products.*','carts.id as cart_id')
        ->get();
        return view('cartlist',['products'=>$products]);
    }
    //////////////////////////////////////////
    function removecart($id)
    {
        Cart::destroy($id);
        return redirect('cartlist');
    }
    //////////////////////////////////////////
    function orderNow()
    { 
        $userId=Session::get('user')['id'];
        $total= $products=DB::table('carts')
        ->join('products','carts.product_id','=','products.id')
        ->where('carts.user_id',$userId)
        ->select('products.*','carts.id as cart_id')
        ->sum('products.price');
        return view('ordernow',['total'=>$total]);
    }
    //////////////////////////////////////////
    function orderPlace(Request $req)
    {
        $userId=Session::get('user')['id'];
        $allCart=Cart::where('user_id',$userId)->get(); 
        foreach($allCart as $cart)
        {
            $order = new Order; 
            $order->product_id=$cart['product_id'];
            $order->user_id=$cart['user_id'];
            $order->status="pending";
            $order->payment_method=$req['payment'];
            $order->payment_status="pending";
            $order->address=$req['address'];
            $order->save();
            Cart::where('user_id',$userId)->delete();
        }
        return redirect('/');
    }
    /////////////////////////////////////////////
    function myOrders()
    {
        $userId=Session::get('user')['id'];
       $orders= DB::table('orders')
        ->join('products','orders.product_id','=','products.id')
        ->where('orders.user_id',$userId)
        ->get();
        return view('myOrders',['orders'=>$orders]);
    }
}
