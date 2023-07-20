<?php
namespace App\Functions;
use App\Models\Stok;

Class update{
    public static function stokupd($all,$request){
        $w=Stok::findOrFail($request->id);
        $w->stokkodu=$all['stokkodu'];
        $w->barkodu=$all['barkodu'];
        $w->stokadi=$all['stokadi'];
        $w->grubu=$all['grubu'];
        $w->altgrubu=$all['altgrubu'];
        $w->marka=$all['marka'];
        $w->alisfiyati=$all['alisfiyati'];
        $w->perakendesatis=$all['perakendesatis'];
        $w->vadelisatis=$all['vadelisatis'];
        $w->kdvalis=$all['kdvalis'];
        $w->kdvsatisprk=$all['kdvsatisprk'];
        $w->kdvsatistptn=$all['kdvsatistptn'];
        $w->indirim=$all['indirim'];
        $w->birimi=$all['birimi'];
        $w->aciklama=$all['aciklama'];
        $w->ozelkodu=$all['ozelkodu'];
        if ($request->resim) {
            $w->resim=$all['resim'];
        }
        $w->save();
}
}