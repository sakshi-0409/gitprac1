<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Orders;
use App\Models\Cart;
use App\Models\Products;
use App\Models\Trendings;
use App\Models\Delivered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class productsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

   
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'p_id' => 'required',
                'p_name' => 'required',
                'p_image' => 'required',
                'des' => 'required',
                'actual_price' => 'required',
                'dis_price' => 'required'
            ]
            );
        $product = new Products;
        $product->p_id = $request['p_id'];
        $product->p_name = $request['p_name'];
        $product->p_image = $request['p_image'];
        if ($request->hasfile('p_image')) {
            $file = $request->file('p_image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('images/', $filename);
            
            $product->p_image = $filename;
        } else {
            return $request;
            $product->p_image = '';
        }
        $product->color = $request['color'];
        $product->des = $request['des'];
        $product->actual_price = $request['actual_price'];
        $product->dis_price = $request['dis_price'];
        $product->save();
        return redirect()->back();
    }

   
    public function edit(string $id)
    {
        
        $product = Products::find($id);
        $url = url('/update') . '/' . $id;
        $title = 'Edit Product <span>&#128393;</span>';
        if (is_null($product)) {
            return redirect('customer/view');
        } else
            $data = compact('product', 'url', 'title');
        return view('/admin/add-new-product')->with($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'p_id' => 'required',
                'p_name' => 'required',
                'p_image' => 'required',
                'des' => 'required',
                'actual_price' => 'required',
                'dis_price' => 'required'
            ]
            );
        $product = Products::find($id);
        $product->p_id = $request['p_id'];
        $product->p_name = $request['p_name'];
        $product->p_image = $request['p_image'];
        if ($request->hasfile('p_image')) {
            $file = $request->file('p_image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('images/', $filename);
            
            $product->p_image = $filename;
        } else {
            return $request;
            $product->p_image = '';
        }
        $product->des = $request['des'];
        $product->actual_price = $request['actual_price'];
        $product->dis_price = $request['dis_price'];
        $product->save();
        return redirect('/operation');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function showtrending()
    {
        return view('/admin/trendings');
    }
    public function trending(Request $request)
    {
        $product = Products::find($request->id);
        // dd($product);
        $trendings = new Trendings;
        $trendings->p_id = $product->p_id;
        $trendings->p_name = $product->p_name;
        $trendings->p_image = $product->p_image;
        $trendings->des =$product->des;
        $trendings->actual_price = $product->actual_price;
        $trendings->dis_price = $product->dis_price;
        $trendings->save();
        return response()->json(['msg'=>'successfull']);

    }
    public function removetrending(Request $request)
    {
        $trendings = Trendings::find($request->id);
        $trendings->delete();
        return response()->json(['msg'=>'successfull']);
    }


    public function delete(Request $request)
    {
        $product = Products::find($request->id);
        $product->delete();
        return response()->json(['msg'=>'successfull']);
    }

    public function order(Request $request){
        // dd($request->all());
        $uniqueId = base_convert(time(), 10, 36);
        $randomString = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 5);
        $orderId = $uniqueId . $randomString;
        
        foreach($request->pid_arr as $k => $product){
            $orders = new Orders;
            $orders->order_id = $orderId;
            $orders->p_id = $product;
            $orders->quantity = $request->quantity_arr[$k];
            $orders->amt = $request->amount_arr[$k];
            $orders->paymode = $request->paymode;
            $orders->status = 'Pending';
            $orders->save();
            $product = Cart::where('p_id','=',"$product")->where('u_id','=',Auth::user()->id);
            $product->delete();
        }


        return response()->json(['msg'=>'successfull']);

    }
   
    public function vieworder(){
        return view('/admin/orders');
    }

    public function delivered(Request $request){
        $delivered = new Delivered;
        $delivered->order_id = $request->o_id;
        $delivered->p_id = $request->p_id;
        $delivered->quantity = $request->quan;
        $delivered->amount = $request->amt;
        $delivered->save();
        $order = Orders::where('order_id','=',"$request->o_id")->where('p_id','=',"$request->p_id");
        $order->delete();

        return response()->json(['msg'=>'successfull']);

    }

    public function view_delivered_orders(){
        return view('/admin/delivered');
    }
}
