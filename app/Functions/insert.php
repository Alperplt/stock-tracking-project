<?php
namespace App\Functions;
use App\Models\Stok;
use App\Models\Cari;
use App\Models\Sayac;
use File;
use Image;
class insert{
    
    public static function stokinst($all,$request){
            $insert=new Stok;
            $insert->stokkodu=$all['stokkodu'];
            $insert->barkodu=$all['barkodu'];
            $insert->stokadi=$all['stokadi'];
            $insert->grubu=$all['grubu'];
            $insert->altgrubu=$all['altgrubu'];
            $insert->marka=$all['marka'];
            $insert->alisfiyati=$all['alisfiyati'];
            $insert->perakendesatis=$all['perakendesatis'];
            $insert->vadelisatis=$all['vadelisatis'];
            $insert->kdvalis=$all['kdvalis'];
            $insert->kdvsatisprk=$all['kdvsatisprk'];
            $insert->kdvsatistptn=$all['kdvsatistptn'];
            $insert->indirim=$all['indirim'];
            $insert->birimi=$all['birimi'];
            $insert->aciklama=$all['aciklama'];
            $insert->ozelkodu=$all['ozelkodu'];
            if ($request->resim) {
                $insert->resim=$all['resim'];
            }
            $insert->save();
    }


    public static function cariinst($all,$request){
        $insert=new Cari;
        $insert->carikodu=$all['carikodu'];
        $insert->cariadi=$all['cariadi'].' '.$all['carisoyadi'];
        $insert->tcno=$all['tcno'];
        $insert->vergino=$all['vergino'];
        $insert->carigrubu=$all['carigrubu'];
        $insert->ticariunvan=$all['ticariunvan'];
        $insert->adres=$all['adres'];
        $insert->telefon=$all['telefon'];
        $insert->email=$all['email'];
        $insert->ozelkod=$all['ozelkod'];
        $insert->durum=1;
        if ($request->image) {
            $insert->image=$all['image'];
        }
        $insert->save();
}
}
