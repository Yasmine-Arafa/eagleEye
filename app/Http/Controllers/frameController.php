<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Http\Requests;
use App\Models\Frame;
//use App\Models\Face;

use App\Http\Resources\FrameResource as FrameResource;
//use App\Http\Resources\FaceResource as FaceResource;

class frameController extends Controller
{

    
    public function index()
    {
        //return Frame::find(68)->getFaces;
        $frames = Frame::paginate(15);

        // Return collection of frames as a resource
       return FrameResource::collection($frames);
    }


    public function store(Request $request)
    {
        // to determine whether to store or update
        //$event = $request->isMethod('put') ? Event::findOrFail($request->id) : new Event;

        $frame = new Frame;

         // Handle event frame Upload
        if($request->hasFile('image'))
        {

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
            $path = $image->storeAs('public/events/frames', $fileNameToStore);


            $image_name = $fileNameToStore;

        }

        else 
        {
                $image_name = 'noFrame.jpg';
        }


        // if($request->hasFile('frames')){
        // $event->frames = implode("|", $frames);
        // }

        $frame->frame_name = $image_name;

        $frame->save();

        return new FrameResource($frame);

    }



    public function show($id)
    {
        $frame = Frame::findOrFail($id);
        $frame->getFaces;
        return new FrameResource($frame);

        // return [
        //     'frame' => new FrameResource($frame),
        //     'faces' => new FaceResource($faces),
        // ];

    }


    public function update(Request $request, $id)
    {
        $frame = Frame::findOrFail($request->id);

        if($request->hasFile('image'))
        {

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
            $path = $image->storeAs('public/events/frames', $fileNameToStore);

            $image_name = $fileNameToStore;
        
         }

        else 
        {
                $image_name = 'noFrame.jpg';
        }



        // if($request->hasFile('frames')){
        // $event->frames = implode("|", $frames);
        // }

        $frame->frame_name = $image_name;

        $frame->save();
        return new FrameResource($frame);

    }



    public function destroy($id)
    {
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
             return new FrameResource($frame);
         
    }

}
