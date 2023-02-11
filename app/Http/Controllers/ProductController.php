<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function index()
    {
        $data = Product::all();
        return view('product')->with('products', $data);
    }

    public function detail($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return view('404_');
        } else {
            return view('detail', compact('product'));
        }
    }

    public function search(Request $request)
    {
        $products = Product::where('name', 'like', '%' . $request->input('query') . '%')
                        ->get();

        return view('search', compact('products'));
    }

    public function addToCart(Request $request)
    {
        if ($request->session()->has('user')) {
            
            Cart::create([
                'product_id' => $request->product_id,
                'user_id' => $request->session()->get('user')->id,
            ]);

            return redirect('/');

        } else {
            return redirect('/login');
        }
    }

    public static function cartItem()
    {
        if(Session::has('user')){

            $userId = Session::get('user')->id;
            return Cart::where('user_id', $userId)->count();
        }
        return 0;
    }

    public function cartList()
    {
        $userId = Session::get('user')->id;
        $products = DB::table('cart')
            ->join('products', 'cart.product_id', '=', 'products.id')
            ->where('cart.user_id', $userId)
            ->select('products.*', 'cart.id as cart_id')
            ->get();

        return view('cartlist', compact('products'));
    }

    public function removeCart($id)
    {
        Cart::destroy($id);
        return redirect('/cartlist');
    }

    public function orderNow()
    {
        $userId = Session::get('user')->id;
        $total = DB::table('cart')
            ->join('products', 'cart.product_id', '=', 'products.id')
            ->where('cart.user_id', $userId)
            ->sum('products.price');

        return view('ordernow', compact('total'));
    }

    public function orderPlace(Request $req)
    {
        $userId = Session::get('user')->id;
        $allCart = Cart::where('user_id', $userId)->get();

        foreach($allCart as $cart)
        {
            Order::create([
                'product_id' => $cart->product_id,
                'user_id' => $cart->user_id,
                'status' => "payer",
                'payment_method' => $req->payment,
                'payment_status' => "payer",
                'address' => $req->address,
            ]);
        }

        Cart::where('user_id', $userId)->delete();

        return redirect("/");
    }

    public function myOrders()
    {
        $userId = Session::get('user')->id;
        $orders = DB::table('orders')
            ->join('products', 'orders.product_id', '=', 'products.id')
            ->where('orders.user_id', $userId)
            ->get();

        return view('myorders', compact('orders'));
    }
}
