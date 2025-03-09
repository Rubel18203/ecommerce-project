<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\user;
use App\Models\carts;
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
    public function Add_cart(Request $request,$id){

      if(Auth::id()){

        $user=Auth::user();
       $products=products::find($id);
      // dd($product);
      $carts=new carts;
      $carts->name=$user->name;
      $carts->email=$user->email;
      //$carts->phone=$user->phone;
      $carts->address=$user->addresh;
      $carts->user_id=$user->id;
      $carts->product_titel	=$products->title;
      $carts->product_id=$products->id;

      if($products->discount_price!=null)
      {
       $carts->price=$products->discount_price*$request->quntity;
      }
      else
      {
      $carts->price=$products->price*$request->quntity;
     }
      $carts->image=$products->image;
      $carts->quantity = $request->quntity;
       $carts->save();
      return redirect()->back();



      }
      else{

        return redirect()->route('login');
      }


      }
      public function cart_show (){


        return view('Home.cart_show');

    }
}
