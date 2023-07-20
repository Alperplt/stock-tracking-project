<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marka extends Model
{
    protected $guarded=[];

    static function brmnames($id){
        $c=Marka::whereid($id)->get();
        $gnm=$c[0]['markaadi'];
        return  $gnm;
    }
}
