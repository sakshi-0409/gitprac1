<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Wishlists;
use App\Models\Customer_contact;
use App\Models\Manufacturer;
use App\Models\Orders;
use App\Models\Products;
use App\Models\User;
use Illuminate\Http\Request;
use mysqli;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class indexController extends Controller
{
    public function index()
    {
        return view('layouts/index');
    }
    public function catalogue()
    {
        $title = "Catalogue";
        $products = Products::all();
        $data = compact('products', 'title');

        return view('layouts/catalogue')->with($data);
    }
    public function product(string $id)
    {
        $products = Products::where('p_id', "$id")->get();
        $man = Manufacturer::find($id);
        $title = $man->name;
        $data = compact('products', 'title');
        return view('layouts/catalogue')->with($data);
    }
    public function category(Request $request)
    {
        $category = $request['category'];
        $products = Products::where('p_name', 'LIKE', "%$category%")->get();
        $data = compact('products');
        return view('layouts/catalogue')->with($data);
    }
    public function search(Request $request)
    {
        $search = $request['search'];
        if($search!=""){
            $products = Products::where('p_name', 'LIKE', "%$search%")
            ->orwhere('des', 'LIKE', "%$search%")
            ->orwhere('color', 'LIKE', "%$search%")
            ->orwhere('dis_price', '<' , $search)->get();
            $title = "Results for " . "'" . $search . "'";
            $data = compact('products', 'title');
                return view('layouts/catalogue')->with($data);
        }
        else{
            return redirect()->back();
        }
    }

    public function about()
    {
        return view('layouts/about');
    }
    public function contact()
    {
        return view('layouts/contact');
    }
    public function user()
    {
        return view('layouts/user');
    }
    public function buy(string $id)
    {
        $product = Products::find($id);
        $data = compact('product');
        return view('layouts/buy')->with($data);
    }

    public function customerContact(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required'
            ]
        );
        $customer_contact = new Customer_contact;
        $customer_contact->name = $request['name'];
        $customer_contact->email = $request['email'];
        $customer_contact->phone = $request['phone'];
        $customer_contact->des = $request['des'];
        $customer_contact->save();
        return redirect()->back();
    }

    public function cart(Request $request)
    {
        // dd($request->all());
        $product = Products::find($request->pid);

        // dd($product);
        $cart = new Cart;
        $cart->m_id = $request->mid;
        $cart->p_id = $request->pid;
        $cart->u_id = $request->uid;
        $cart->p_name = $product->p_name;
        $cart->p_image = $product->p_image;;
        $cart->des = $product->des;
        $cart->actual_price = $product->actual_price;
        $cart->dis_price = $product->dis_price;
        $cart->save();
        $cartnotifications = DB::table('carts')
            ->where('u_id', '=', @Auth::user()->id)
            ->count();
        return response()->json(['msg' => 'successfull', 'product' => $product, 'notifications' => $cartnotifications]);
    }
    public function viewcart()
    {
        return view('layouts/cart');
    }
    public function removecart(Request $request)
    {
        $product = Cart::find($request->id);
        $product->delete();
        $cartnotifications = DB::table('carts')
            ->where('u_id', '=', @Auth::user()->id)
            ->count();
        $amount = Cart::where('u_id', '=', @Auth::user()->id)->sum('dis_price');
        return response()->json(['msg' => 'successfull', 'notifications' => $cartnotifications, 'amt' => $amount]);
    }

    public function wishlist(Request $request)
    {
        $product = Products::find($request->pid);

        // dd($product);
        $wishlist = new Wishlists;
        $wishlist->m_id = $request->mid;
        $wishlist->p_id = $request->pid;
        $wishlist->u_id = $request->uid;
        $wishlist->p_name = $product->p_name;
        $wishlist->p_image = $product->p_image;
        $wishlist->des = $product->des;
        $wishlist->actual_price = $product->actual_price;
        $wishlist->dis_price = $product->dis_price;
        $wishlist->save();
        return response()->json(['msg' => 'successfull']);
    }
    public function showwishlist()
    {
        return view('layouts/wishlist');
    }
    public function removewishlist(Request $request)
    {
        $product = Wishlists::find($request->id);
        $product->delete();

        return response()->json(['msg' => 'successfull']);
    }
    public function removecatwish(Request $request)
    {
        $product = Wishlists::where('p_id', '=', $request->pid)->where('u_id', '=', $request->uid);
        $product->delete();

        return response()->json(['msg' => 'successfull']);
    }
    public function checkout()
    {
        return view('layouts/checkout');
    }
}
