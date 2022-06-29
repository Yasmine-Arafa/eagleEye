<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Face extends Model
{
    protected $table = 'faces';
    public $primarykey = 'id';
    public $timestamps = false ;
    use HasFactory;

    public function getFrame(){
        return $this->belongsTo('App\Models\Frame', 'frame_id');
    }
}
