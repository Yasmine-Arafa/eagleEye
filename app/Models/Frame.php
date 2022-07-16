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
}
