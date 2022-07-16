<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Http\Requests;
use App\Models\Face;
class adminFaceController extends Controller
{

    public function index(Request $request)
    {
        if ($request->session()->has('admin')){

            $faces = Face::all();

            return view('faces')-> with('faces', $faces);
        }
        else{
            return redirect('/login');
        }
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Request $request, $id)
    {
        if ($request->session()->has('admin')){

            $face = Face::findOrFail($id);
            $face->getFrame;
        }
        else{
            return redirect('/login');
        }

        return view('face_details')->with('face',$face);
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
