<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\user;
use App\Models\carts;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

use function Ramsey\Uuid\v1;

class AdminController extends Controller
{
    public function home()
    {
        $products = Products::paginate(3);

        return view('Home.Userpage', Compact('products'));
    }

    public function index()
    {
        if (Auth::check()) {
            $usertype = Auth::user()->Usertype;

            if ($usertype === '1') {
                return view('Admin.index');
            } else {
                $products = Products::paginate(3);
                return view('Home.Userpage', compact('products'));
            }
        }

        return redirect()->route('login');
    }
    public function product_details($id)
    {
        $products = products::find($id);

        return view('Home.product_details', compact('products'));
    }
    public function Add_cart(Request $request, $id)
    {

        if (Auth::id()) {

            $user = Auth::user();
            $products = products::find($id);
            // dd($product);
            $carts = new carts;
            $carts->name = $user->name;
            $carts->email = $user->email;
            //$carts->phone=$user->phone;
            $carts->address = $user->addresh;
            $carts->user_id = $user->id;
            $carts->product_titel    = $products->title;
            $carts->product_id = $products->id;

            if ($products->discount_price != null) {
                $carts->price = $products->discount_price * $request->quntity;
            } else {
                $carts->price = $products->price * $request->quntity;
            }
            $carts->image = $products->image;
            $carts->quantity = $request->quntity;
            $carts->save();
            return redirect()->back();
        } else {

            return redirect()->route('login');
        }
    }
    public function cart_show()
    {
        if (Auth::id()) {
            $id = Auth::user()->id;
            $cart = carts::where('user_id', "=", $id)->get();
        } else {
            return redirect('login');
        }



        return view('Home.cart_show', compact('cart'));
    }
    public function remove($id)
    {
        $cart = carts::find($id);
        $cart->delete();
        return redirect()->back();
    }
    public function cash_order()
    {

        // return view('Home.cash');
        $user = Auth::user();
        // dd($user);
        $userid = $user->id;
        //dd($user_id);
        $data = carts::where('user_id', '=', $userid)->get();
        //dd($data);
        foreach ($data as $data) {
            $Order=new Order;
            $Order->name = $data->name;
            $Order->email = $data->email;
            $Order->address = $data->address;
            $Order->phone = $data->phone;
            $Order->user_id = $data->user_id;
            $Order->product_titel= $data->product_titel;
            $Order->quantity = $data->quantity;
            $Order->image = $data->	image;
            $Order->product_id = $data->product_id;
            $Order->price= $data->price;
            $Order->payment_status='cash on delivery';
            $Order->delivery_status='processing';


            $Order->save();
            $cart_id=$data->id;
            $cart=carts::find($cart_id);
            $cart->delete();
        }
        return redirect()->back();
    }
}
