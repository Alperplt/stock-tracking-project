<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stokbirim extends Model
{
   protected $guarded=[];

   static function brmnames($id){
      $c=Stokbirim::whereid($id)->get();
      $brm=$c[0]['birimadi'];
      return $brm;
   }
}
