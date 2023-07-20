<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stokgrup extends Model
{
    protected $guarded=[];

    static function grpnames($id){
        $c=Stokgrup::whereid($id)->get();
        @$gnm=$c[0]['grupadi'];
        return  @$gnm;
    }
}
