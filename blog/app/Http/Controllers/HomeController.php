<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\products;



class HomeController extends Controller
{
  public function view()
  {
    $data = category::all();
    return view('Admin.Category', compact('data'));
  }

  public function Add_category(Request $request)
  {
    $data = new category();
    $data->name_category = $request->name;
    $data->save();
    return redirect()->back()->with('message', 'The message was successful.');
  }


  public function deletedata($id = null)
  {
    $deletedata = category::find($id);
    $deletedata->delete();
    return redirect()->back()->with('message', 'The message was successful.');
  }
  public function product()
  {
    $Category = Category::all();
    return view('Admin.product', compact('Category'));
  }

  // public function store(Request $request)
  // {

  //   echo "<pre>";
  //   print_r($request->all());
  //   exit();

  //   $product=new products();
  //   $product->title=$request->title;
  //   $product->description=$request->description;
  //   $product->quantity=$request->quantity;
  //   $product->category=$request->category_id;
  //   //$products->image=$request->image;  
  //   $product->price=$request->price;
  //   $product->image=$request->image; 

  //   if ($request->has('image')) {

  //     $request->validate([
  //         'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
  //     ]);


  //     $imageName = time() . '.' . $request->image->getClientOriginalExtension();


  //     $request->image->move(public_path('product/images/'), $imageName);


  //     $product->save();
  //     return redirect()->back();
  //   }
  // }


  //$product->save();

  // return redirect()->back();


  public function store(Request $request)
  {
    // Validate the incoming request data
    $validatedData = $request->validate([
      'title' => 'required|string|max:255',
      'description' => 'required|string',
      'quantity' => 'required|integer|min:1',
      'category_id' => 'required|integer|exists:categories,id',
      'price' => 'required|numeric|min:0',
      'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    try {
      // Create a new product instance
      $product = new Products();
      $product->title = $request->title;
      $product->description = $request->description;
      $product->quantity = $request->quantity;
      $product->category = $request->category_id;
      $product->price = $request->price;

      // Handle the image upload if an image is provided
      if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->image->getClientOriginalExtension();
        $request->image->move(public_path('product/images/'), $imageName);
        $product->image = 'product/images/' . $imageName;
      }

      // Save the product to the database
      $product->save();

      // Redirect back with a success message
      return redirect()->back()->with('success', 'Product created successfully!');
    } catch (\Exception $e) {
      // Redirect back with an error message in case of failure
      return redirect()->back()->with('error', 'An error occurred while creating the product.');
    }
  }



  public function show_product()
  {
    $product = products::all();
    return view('Admin.show_product', compact('product'));
  }
  public function delete($id){
    $product=products::find($id);
    $product->delete();
    return redirect()->back()->with('message', 'The message was successful.');
  }
  public function Edit($id){
    $product=products::find($id);
     
    return view('Admin.Edit',compact('product'));
  }
  public function update(Request $request, $id){

    $validatedData = $request->validate([
      'title' => 'required|string|max:255',
      'description' => 'required|string',
      'quantity' => 'required|integer|min:1',
      'category_id' => 'required|integer|exists:categories,id',
      'price' => 'required|numeric|min:0',
      'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    try {
      // Create a new product instance
      $product=products::find($id);
      $product->title = $request->title;
      $product->description = $request->description;
      $product->quantity = $request->quantity;
      $product->category = $request->category_id;
      $product->price = $request->price;

      // Handle the image upload if an image is provided
      if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->image->getClientOriginalExtension();
        $request->image->move(public_path('product/images/'), $imageName);
        $product->image = 'product/images/' . $imageName;
      }

      // Save the product to the database
      $product->save();

      // Redirect back with a success message
      return redirect()->back()->with('success', 'Product created successfully!');
    } catch (\Exception $e) {
      // Redirect back with an error message in case of failure
      return redirect()->back()->with('error', 'An error occurred while creating the product.');
    }
  }
}
