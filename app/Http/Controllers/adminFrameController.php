<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Http\Requests;
use App\Models\Frame;
class adminFrameController extends Controller
{

    public function index(Request $request)
    {
        if ($request->session()->has('admin')){
            $frames = Frame::all();
            return view('frames')-> with ('frames', $frames);
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

            $frame = Frame::findOrFail($id);
            $frame->getFaces;

            return view('frame_details')->with('frame',$frame);
          }
        else{
            return redirect('/login');
        }

    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy(Request $request, $id)
    {
        if ($request->session()->has('admin')){

            $frame = Frame::findOrFail($id);
            $frame->getFaces;

            // delete faces images from storage
            $data = json_decode($frame);
            $faces = $data->get_faces;  //array of objects
            foreach ($faces as $face)       //each object
                    {
                        $image_name = $face->face_name;

                        $file_path = 'events/faces/'.$image_name;

                        // delete face from storage
                        Storage::disk('public')->delete($file_path);
                    }

            // delete whole related faces records
            $frame->getFaces()->delete();

            // delete frame image from storage
            $image_name = $frame->frame_name;
            $file_path = 'events/frames/'.$image_name;
            Storage::disk('public')->delete($file_path);

            //delete entire frame record from DB
            if($frame->delete())
                 return redirect('/frames');
        }
        else{
            return redirect('/login');
        }


    }

}
