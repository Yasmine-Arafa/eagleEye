<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Http\Requests;
use App\Models\Event;
use App\Http\Resources\Event as EventResource;

class eventController extends Controller
{

    
    public function index()
    {
        $events = Event::paginate(15);

        // Return collection of events as a resource
       return EventResource::collection($events);
    }


    public function store(Request $request)
    {
        // to determine whether to store or update
        //$event = $request->isMethod('put') ? Event::findOrFail($request->id) : new Event;

        $event = new Event;

         // Handle event frames collection Upload
        if($request->hasFile('video'))
        {
            //dd($request->file('frames'));

            $video = $request->file('video');

            // Get filename with the extension
            $filenameWithExt = $video->getClientOriginalName();

            // Get just filename
            $filename = pathinfo($filenameWithExt , PATHINFO_FILENAME);

            // Get just ext
            $extension = $video->getClientOriginalExtension();

            // File name to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            // Upload Video
            $path = $video->storeAs('public/videos', $fileNameToStore);


            $video_name = $fileNameToStore;


            // foreach($images as $image)
            // {

            //     // Get filename with the extension
            //     $filenameWithExt = $image->getClientOriginalName();

            //     // Get just filename
            //     $filename = pathinfo($filenameWithExt , PATHINFO_FILENAME);

            //     // Get just ext
            //     $extension = $image->getClientOriginalExtension();

            //     // File name to store
            //     $fileNameToStore = $filename.'_'.time().'.'.$extension;

            //     // Upload Image
            //     $path = $image->storeAs('public/frames', $fileNameToStore);
            //     $frames[] = $fileNameToStore;
            // }
            // $counter = count($frames);
        }

        else 
        {
                $video_name = 'novideo.wav';
        }


        // if($request->hasFile('frames')){
        // $event->frames = implode("|", $frames);
        // }

        $event->frames = $video_name;

        $event->frames_no = 1;

        $event->save();

        return new EventResource($event);

    }



    public function show($id)
    {
        $event = Event::findOrFail($id);
        return new EventResource($event);
    }



    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($request->id);

        if($request->hasFile('video'))
        {

            $video = $request->file('video');

            // Get filename with the extension
            $filenameWithExt = $video->getClientOriginalName();

            // Get just filename
            $filename = pathinfo($filenameWithExt , PATHINFO_FILENAME);

            // Get just ext
            $extension = $video->getClientOriginalExtension();

            // File name to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            // Upload video
            $path = $video->storeAs('public/videos', $fileNameToStore);


            $video_name = $fileNameToStore;
        


        //     foreach($images as $image)
        //     {

        //         // Get filename with the extension
        //         $filenameWithExt = $image->getClientOriginalName();

        //         // Get just filename
        //         $filename = pathinfo($filenameWithExt , PATHINFO_FILENAME);

        //         // Get just ext
        //         $extension = $image->getClientOriginalExtension();

        //         // File name to store
        //         $fileNameToStore = $filename.'_'.time().'.'.$extension;

        //         // Upload Image
        //         $path = $image->storeAs('public/videos', $fileNameToStore);
        //         $frames[] = $fileNameToStore;
        //     }
        //     $counter = count($frames);
         }

        else 
        {
                $video_name = 'novideo.wav';
        }



        // if($request->hasFile('frames')){
        // $event->frames = implode("|", $frames);
        // }

        $event->frames = $video_name;

        $event->frames_no = 1;

        $event->save();
        return new EventResource($event);

    }



    public function destroy($id)
    {
        $event = Event::findOrFail($id);


        $video_name = $event->frames;

        $file_path = 'videos/'.$video_name;

        // delete video from storage
         Storage::disk('public')->delete($file_path);

        //delete entire event record from DB
        if($event->delete())
             return new EventResource($event);
         
    }
}
