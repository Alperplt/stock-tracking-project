<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Depohareket extends Model
{
    protected $guarded=[];


    static function hareketno($hrno){
        if($hrno==1){
          return  $hr="Giriş";
        }
        elseif ($hrno==0) {
          return  $hr="Çıkış";
        }
        
    }

    static function hareketturuno($hrtr){
      if($hrtr==1){
        return  $hr="Giriş Hareketi";
      }
      elseif ($hrtr==0) {
        return  $hr="Çıkış Hareketi";
      }

      elseif ($hrtr==2) {
        return  $hr="Sipariş Hareketi";
      }
  }

    static function sumHr($id){
      $hrktsgr=Depohareket::whereurunid($id)->wherehareket(1)->sum('miktar');
      $hrktsck=Depohareket::whereurunid($id)->wherehareket(0)->sum('miktar');
      $genel=$hrktsgr-$hrktsck;
      return $genel;
    }

 

    static function sumDepoHr($id,$depoid){
      $hrktsgr=Depohareket::whereurunid($id)->wherehareket(1)->wheredepoid($depoid)->sum('miktar');
      $hrktsck=Depohareket::whereurunid($id)->wherehareket(0)->wheredepoid($depoid)->sum('miktar');
      $genel=$hrktsgr-$hrktsck;
      return $genel;
    }

    static function depotoplamkalem($id){
        $c=Depohareket::select('urunid')->wheredepoid($id)->groupBy('urunid')->get();
        return $c;
    }

    static function depotoplamlar($id){
      $g=Depohareket::wheredepoid($id)->wherehareket(1)->sum('miktar');
      $c=Depohareket::wheredepoid($id)->wherehareket(0)->sum('miktar');
      $toplam=$g-$c;
      return $toplam;
  }

  static function depotoplamlarkalem($id){
    $c=Depohareket::select('depoid')->wheredepoid($id)->groupBy('depoid')->count('urunid');
    return $c;
  }

  static function toplamsayi($id){
    $g=Depohareket::wherehareket(1)->sum('miktar');
    $c=Depohareket::wherehareket(0)->sum('miktar');
    $toplam=$g-$c;
    return $toplam;
}
  
  static function stokurundepo($id){
        $a=DB::table('Depoharekets')
        ->whereurunid($id)
        ->wherehareket(1)
        ->selectRaw("Sum(miktar) as miktar, depoid")
        ->groupBy('depoid')
        ->get();
        return $a;
  }

  static function stokuruncikandepo($id){
    $b=DB::table('Depoharekets')
    ->whereurunid($id)
    ->wherehareket(0)
    ->selectRaw("Sum(miktar) as miktar, depoid")
    ->groupBy('depoid')
    ->get();
    return $b;
}


}
