<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class authController extends Controller
{
    
    public function auth(Request $request)
    {
        if($request->mail == "admin@eagle-eye.com" && $request->pass == "admin123")
            return "authenticated";
        else
            return "not authenticated";
    }
}
