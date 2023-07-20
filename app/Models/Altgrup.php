<?php

namespace App\Models;
use App\Models\Stokgrup;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Altgrup extends Model
{
    protected $guarded=[];

    static function grpnames($id){
        $c=Altgrup::whereid($id)->get();
        $gnm=$c[0]['altgrupadi'];
        return  $gnm;
    }

}
