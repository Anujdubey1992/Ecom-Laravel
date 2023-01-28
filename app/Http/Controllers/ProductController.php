<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
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
}
