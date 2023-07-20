<?php
namespace App\Functions;
use App\Models\Sayac;
use File;
use Image;
use App\Models\Stok;
use App\Models\Stokgrup;
use App\Models\Stokbirim;
use App\Models\Marka;
use App\Models\Depo;
use App\Models\Depohareket;
use App\Models\Cari;
use App\Models\Carigrubu;
use Illuminate\Support\Facades\DB;
class search{
    
    public static function stoksearch($all){
        $saycs=Sayac::where('stoksayac','>=','-1')->get();
        $data['sayackod']=$saycs[0]['stoksyadi'];
        $data['sayacs']=$saycs[0]['stoksayac']+1;
        $data['brkdtr']=rand(868,869).rand(1000000000,9999999999);
        $data['stokgrups']=Stokgrup::orderby('grupadi','asc')->get();
        $data['stokbirim']=Stokbirim::orderby('birimadi','asc')->get();
        $data['stokdepo']=Depo::orderby('id','asc')->get();
        $data['marka']=Marka::orderby('markaadi','asc')->get();
        
        switch ($all['siralama']) {
                case '0':
                        $sutun="id";
                        $durum="asc";
                    break;

                case '1':
                        $sutun="id";
                        $durum="desc";
                break;
                case '2':
                        $sutun="stokkodu";
                        $durum="asc";
                break;

                case '3':
                    $sutun="stokkodu";
                    $durum="desc";
                break;

                case '4':
                    $sutun="stokadi";
                    $durum="asc";
                break;

                case '5':
                    $sutun="stokadi";
                    $durum="desc";
                break;

                case '6':
                    $sutun="durum";
                    $durum="desc";
                break;

                case '7':
                    $sutun="durum";
                    $durum="asc";
                break;

                case '8':
                    $sutun="satisfiyati";
                    $durum="asc";
                break;

                case '9':
                    $sutun="satisfiyati";
                    $durum="desc";
                break;

                case '10':
                    $sutun="alisfiyati";
                    $durum="asc";
                break;

                case '11':
                    $sutun="alisfiyati";
                    $durum="desc";
                break;
            
            default:
                # code...
                break;
        }

   
          $whiteList = ['stokkodu','stokadi','barkodu','grubu','ozelkodu','marka','birimi','durum'];

          $data['ara']=Stok::where(function($query) use($all,$whiteList){

          foreach($all as $key=>$value){
            if(in_array($key,$whiteList)){
                $query->Where(DB::raw('COALESCE('.$key.',0)'),'LIKE','%'.$value.'%');
            }
            }})->paginate(10);

          ////////////////////////////////////////////

          $whiteLists = ['stokkodu','stokadi','barkodu','grubu','ozelkodu','marka','birimi','durum'];

          $data['sara']=Stok::where(function($query) use($all,$whiteLists){
    
          foreach($all as $key=>$values){
             if(in_array($key,$whiteLists)){
                 $query->Where(DB::raw('COALESCE('.$key.',0)'),'LIKE','%'.$values.'%');
               }
           }})->get();

                    
            return view('admin.stok.search',$data);
    }


    public static function dphsearch($all){
        $data['depos']=Depohareket::select('depoid')->groupby('depoid')->get();
        $data['hrturu']=Depohareket::select('hareketturu')->groupby('hareketturu')->get();
        $saycs=Sayac::where('stoksayac','>=','-1')->get();
        $data['stokdepo']=Depo::orderby('id','asc')->get();

            $data['ara']=DB::table('depoharekets')
            ->where(DB::raw('COALESCE(evrakno,0)'),'LIKE','%'.$all['evrakno'].'%')
            ->where(DB::raw('COALESCE(hareket,0)'),'LIKE','%'.$all['harekettipi'].'%')
            ->where(DB::raw('COALESCE(urunid,0)'),'LIKE','%'.Stok::stokkoddphr($all['stokkodu']).'%')
            ->where(DB::raw('COALESCE(depoid,0)'),'LIKE','%'.$all['depo'].'%')
            ->where(DB::raw('COALESCE(created_at,0)'),'>=',$all['bastarih'],'and',DB::raw('COALESCE(created_at,0)'),'<=',$all['bittarih'])
            ->where(DB::raw('COALESCE(hareketturu,0)'),'LIKE','%'.$all['hrktturu'].'%')
            ->paginate(20);

            $data['sara']=DB::table('depoharekets')
            ->where(DB::raw('COALESCE(evrakno,0)'),'LIKE','%'.$all['evrakno'].'%')
            ->where(DB::raw('COALESCE(hareket,0)'),'LIKE','%'.$all['harekettipi'].'%')
            ->where(DB::raw('COALESCE(urunid,0)'),'LIKE','%'.Stok::stokkoddphr($all['stokkodu']).'%')
            ->where(DB::raw('COALESCE(depoid,0)'),'LIKE','%'.$all['depo'].'%')
            ->where('created_at','>=',$all['bastarih'])
            ->where('created_at','<=',$all['bittarih'])
            ->where(DB::raw('COALESCE(hareketturu,0)'),'LIKE','%'.$all['hrktturu'].'%')
            ->get();

        return view('admin.depo.depohareket.search',$data);
    }//SONRA KONTROL EDİLECEK


    public static function carisearch($all){
        $saycs=Sayac::where('carisayac','>=','-1')->get();
        $data['sayackod']=$saycs[0]['carisyadi'];
        $data['sayacs']=$saycs[0]['carisayac']+1;
        $data['brkdtr']=rand(868,869).rand(1000000000,9999999999);
        $data['liste']=Cari::paginate(10);
        $data['carigrups']=Carigrubu::orderby('grupadi','asc')->get();
        
        switch ($all['siralama']) {
                case '0':
                        $sutun="id";
                        $durum="asc";
                    break;

                case '1':
                        $sutun="id";
                        $durum="desc";
                break;
                case '2':
                        $sutun="carikodu";
                        $durum="asc";
                break;

                case '3':
                    $sutun="carikodu";
                    $durum="desc";
                break;

                case '4':
                    $sutun="cariadi";
                    $durum="asc";
                break;

                case '5':
                    $sutun="cariadi";
                    $durum="desc";
                break;

                case '6':
                    $sutun="durum";
                    $durum="desc";
                break;

                case '7':
                    $sutun="durum";
                    $durum="asc";
                break;

                case '8':
                    $sutun="carigrubu";
                    $durum="asc";
                break;

                case '9':
                    $sutun="carigrubu";
                    $durum="desc";
                break;
            
            default:
                # code...
                break;
        }
        
        $whiteList = ['carikodu','cariadi','carigrubu','tcno','vergino','ticariunvan','telefon','durum'];

        $data['ara']=Cari::where(function($query) use($all,$whiteList){

            foreach($all as $key=>$value){
            if(in_array($key,$whiteList)){
                $query->where($key,'LIKE','%'.$value.'%');
            }
            }})->paginate(10);


            
            
        return view('admin.cari.search',$data);

           // 
        
    }
}
