<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Depo extends Model
{
    protected $guarded=[];

    static function depoadis($id){
        $dpads=Depo::whereid($id)->get();
        $dpadss=$dpads[0]['depoadi'];
        return $dpadss;
    }
}
