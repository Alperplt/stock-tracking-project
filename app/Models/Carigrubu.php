<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carigrubu extends Model
{
    protected $guarded=[];

    static function grpnames($id){
        $c=Carigrubu::whereid($id)->get();
        $gnm=$c[0]['grupadi'];
        return  $gnm;
    }
}
