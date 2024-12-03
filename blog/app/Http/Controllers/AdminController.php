<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Http\Request;

class AdminController extends Controller

{


   public function home(){
    return view('Home.Userpage');
   }
    public function index()
    {
        if (Auth::check()) {
            $usertype = Auth::user()->Usertype; 

            if ($usertype === 'User') {
                return view('Home.Userpage'); 
            } elseif ($usertype === 'Admin') {
                return view('Admin.index');
            } else {
                return redirect()->back(); 
            }
        }

       
    }
}
