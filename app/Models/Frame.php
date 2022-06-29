<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Frame extends Model
{
    protected $table = 'frames';
    public $primarykey = 'id';
    public $timestamps = false ;
    use HasFactory;

    public function getFaces(){
        return $this->hasMany('App\Models\Face');
    }

        // // this is a recommended way to declare event handlers
        // public static function boot() {
        //     parent::boot();
    
        //     static::deleting(function($frame) { // before delete() method call this
                
        //         // to delete faces images
        //         foreach ($frame->getFaces as $face)
        //         {
        //             $image_name = $face->face_name;

        //             $file_path = 'events/faces/'.$image_name;

        //             // delete face from storage
        //             Storage::disk('public')->delete($file_path);
        //         }

        //         $frame->getFaces()->delete();
        //     });
        // }
}
