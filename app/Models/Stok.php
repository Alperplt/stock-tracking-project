<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stok extends Model
{
    protected $guarded=[];

    static function stoksayisigrup($id){
        $toplam=Stok::wheregrubu($id)->count();
        return $toplam;
    }

    static function stoksayisialtgrup($id){
        $toplam=Stok::wherealtgrubu($id)->count();
        return $toplam;
    }

    static function stokadis($id){
        $stokad=Stok::whereid($id)->get();
        $stokads=$stokad[0]['stokadi'];
        return $stokads;
    }

    static function stokkod($id){
        $stokkod=Stok::whereid($id)->get();
        $stokkods=$stokkod[0]['stokkodu'];
        return $stokkods;
    }

    static function stokkoddphr($name){
        @$stokkod=Stok::wherestokkodu($name)->get();
        @$stokkods=$stokkod[0]['id'];
        return @$stokkods;
    }

    static function stoksayisimarka($id){
        $toplam=Stok::wheremarka($id)->count();
        return $toplam;
    } 
    
    static function stoksayisibirim($id){
        $toplam=Stok::wherebirimi($id)->count();
        return $toplam;
    }

    static function stokkdvhesap($id){
        $stfiyat=Stok::whereid($id)->get();
        $satisfiyat=$stfiyat[0]['perakendesatis'];
        $kdvtutar=($satisfiyat/100)*$stfiyat[0]['kdvsatisprk'];
        return $kdvtutar;

    }

}
