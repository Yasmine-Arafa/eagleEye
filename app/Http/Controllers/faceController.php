<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Http\Requests;
use App\Models\Face;
use App\Http\Resources\FaceResource as FaceResource;


class faceController extends Controller
{
    
    public function index()
    {
        $faces = Face::paginate(15);

        // Return collection of frames as a resource
       return FaceResource::collection($faces);
    }

    

    public function store(Request $request, $frame_id)
    {
        $face = new Face;

        if($request->hasFile('image')){

            $image = $request->file('image');

            // Get filename with the extension
            $filenameWithExt = $image->getClientOriginalName();

            // Get just filename
            $filename = pathinfo($filenameWithExt , PATHINFO_FILENAME);

            // Get just ext
            $extension = $image->getClientOriginalExtension();

            // File name to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            // Upload image
            $path = $image->storeAs('public/events/faces', $fileNameToStore);


            $image_name = $fileNameToStore;
        }
        else {
            $image_name = 'noFace.jpg';
        }

        $face->face_name = $image_name;
        $face->frame_id = $frame_id;

        $face->save();

        return new FaceResource($face);
    }

    
    public function show($id)
    {
        $face = Face::findOrFail($id);
        $face->getFrame;
       return new FaceResource($face);
    }


    public function destroy($id)
    {
        $face = Face::findOrFail($id);

        $image_name = $face->face_name;

        $file_path = 'events/faces/'.$image_name;

        // delete face from storage
         Storage::disk('public')->delete($file_path);

        //delete entire face record from DB
        if($face->delete())
             return new FaceResource($face);
         
    }
}
