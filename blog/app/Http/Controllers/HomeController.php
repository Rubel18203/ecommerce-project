<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\products;

class HomeController extends Controller
{
    public function view(){
        $data= category::all();
        return view('Admin.Category',compact('data'));
    }
     
     public function Add_category(Request $request){
        $data =new category();
        $data->name_category =$request->name;
        $data->save();
        return redirect()->back()->with('message', 'The message was successful.');

     }
    

     public function deletedata($id=null){
      $deletedata =category::find($id);
      $deletedata-> delete();
      return redirect()->back()->with('message', 'The message was successful.');

   }
     public function product(){
       $Category= Category::all();
      return view('Admin.product',compact('Category'));
    }
     
    public function store(Request $request){
      $product =new products();
      $product->title=$request->title;
      $product->description=$request->description;
      $product->quantity=$request->quantity;
      $product->category=$request->category_id;
      $product->price=$request->price;
       
      
      
          $request->validate([
              'name' => 'required|string|max:255',
              'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
          ]);
      
          if ($request->hasFile('photo')) {
              $file = $request->file('photo');
              $filename = time() . '_' . $file->getClientOriginalName();
              $file->move(public_path('uploads'), $filename);
      
              $product = new Products();
           
              $product->image = 'uploads/' . $filename;
              $product->save();
          }
      
          return redirect()->back()->with('success', 'Product added successfully!');
 
      
      $product->save();
      return redirect()->back();

    }
   
    
}
