<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class userAuthController extends Controller
{
    // return (add guard form) view
    public function create(Request $request){
        if ($request->session()->has('admin')){
            return view('createGuard');
        }
        else
            return redirect('/');
    }

    // add new guard
    public function add(Request $request){

        if ($request->session()->has('admin')){

            $this->validate($request,[
                'name'=> 'required' ,
                'username' => 'required' ,
                'password' => 'required'
            ]);

            $user = new User;
            $user->name = $request->input('name');
            $user->username = $request->input('username');
            $user->password =  Hash::make($request->input('password'));
            $user->save();

            // return redirect('/frames')->with('success','product is Updated');
        }
        else
            return redirect('/');
    }

    // verify user API to mobile app
    public function userauth(Request $request)
    {
            $user = User::where('username', '=', $request->username)->first();
            if ($user==NULL) {
                return response()->json(['success'=>false, 'message' => 'Login Fail, please check username']);
             }
            if(!Hash::check($request->password, $user->password))
            {
                return response()->json(['success'=>false, 'message' => 'Login Fail, please check password']);
            }
            else
            return response()->json(['success'=>true,'message'=>'Login Success']);
    }

}
