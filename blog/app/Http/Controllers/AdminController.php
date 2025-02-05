<?php
 namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function home()
    {
        $products = Products::all();

        return view('Home.Userpage', Compact('products'));
    }

    public function index()
    {
        if (Auth::check()) {
            $usertype = Auth::user()->Usertype;

            if ($usertype === '1') {
                return view('Admin.index');
            } else {
                $products = Products::all();
                return view('Home.Userpage', compact('products'));
            }
        }

        return redirect()->route('login');
    }
}
