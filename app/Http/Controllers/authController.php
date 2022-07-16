<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class authController extends Controller
{
    //return Admin login view
    public function index(Request $request)
    {
        if ($request->session()->has('admin'))
            return redirect('/frames');
        else
            return view('login');
    }
    public function logout(Request $request){
        if ($request->session()->has('admin')){

            $request->session()->forget('admin');
            return redirect('/');
        }
        else
        return redirect('/');
    }

    //Verify admin authentication
    public function adminauth(Request $request)
    {
        if ($request->session()->has('admin')){
            return redirect('/frames');
        }

        else if($request->username == "admin123" && $request->password == "admin123")
            {
                $request->session()->put('admin', 'admin123');
                // $_SESSION["username"] = "admin123";
                return redirect('/frames');
            }

        else{
            $error = "These credentials do not match our records.";
            return view('login')-> with ('error',$error );
        }
    }

}
