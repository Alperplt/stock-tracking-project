<?php

namespace App\Http\Controllers\admin\cari;
use App\Models\Cari;
use App\Models\Carigrubu;
use App\Models\Sayac;
use App\Functions\insert;
use App\Functions\update;
use App\Functions\search;
use File;
use Image;
use Illuminate\Support\Facades\DB;
use App\Exports\CariExport;
use App\Imports\CariImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class indexController extends Controller
{

    public function index(){
        $saycs=Sayac::where('carisayac','>=','-1')->get();
        $data['sayackod']=$saycs[0]['carisyadi'];
        $data['sayacs']=$saycs[0]['carisayac']+1;
        $data['brkdtr']=rand(868,869).rand(1000000000,9999999999);
        $data['liste']=Cari::paginate(10);
        $data['carigrups']=Carigrubu::orderby('grupadi','asc')->get();
        return view('admin.cari.index',$data);
    }

    public function store(Request $request){
        $all=$request->except('_token');
        $saartir=$all['sayacartir'];
        
        $c=Cari::wherecarikodu($all['carikodu'])->count();
        if ($all['tcno']!=null || $all['vergino']!=null ) {
            $tcno=Cari::wheretcno($all['tcno'])->count();
            $vergino=Cari::wherevergino($all['vergino'])->count();

            if ($c==0 && ($tcno==0 || $vergino==0)) {
                if ($request->image) {
                    $resimyolu=$all['carikodu'].'.'.$all['image']->getclientoriginalextension();
                    $all['image']->move(public_path('/images/cariler'),$resimyolu);
                    $all['image']="/images/cariler/".$resimyolu;
                }
                $saycs=Sayac::where('carisayac','>=','-1')->update(['carisayac'=>$saartir]);    
                $cariveri=new insert;
                $cariveri->cariinst($all,$request); 
                
                if ($cariveri) {
                    return redirect()->back()->with('status','İşlem Başarılı');
                }
                else{
                    return redirect()->back()->with('status','İşlem Başarısız');
                }
            }
    
            else{
                return redirect()->back()->with('status','Bu veri sisteme önceden kayıt edilmiş');
            }
        }


        else{
            if ($request->image) {
                $resimyolu=$all['carikodu'].'.'.$all['image']->getclientoriginalextension();
                $all['image']->move(public_path('/images/cariler'),$resimyolu);
                $all['image']="/images/cariler/".$resimyolu;
            }
            $saycs=Sayac::where('carisayac','>=','-1')->update(['carisayac'=>$saartir]);    
            $cariveri=new insert;
            $cariveri->cariinst($all,$request); 
            
            if ($cariveri) {
                return redirect()->back()->with('status','İşlem Başarılı');
            }
            else{
                return redirect()->back()->with('status','İşlem Başarısız');
            }
        

        }

       
    }

    public function search(){
       $all=$_GET;
       $stearch= new search;
       return $stearch->carisearch($all);
    }


    public function switch(Request $request){
        $slist=Stok::findOrFail($request->id);
        $slist->durum=$request->durum=="true" ? 1:0;
        $slist->save();
    }

    public function sedit($id){
        $data=Stok::find($id);
        return response()->json($data);
    }

    public function update(Request $request){
        $all=$request->except('_token');
        $c=Stok::whereid($all['id'])->count();
            $w=Stok::find($request->id);
            if ($request->resim) {
                $resimyol=public_path($w['resim']);
                unlink($resimyol);
                $resimyolu=$all['stokkodu'].'.'.$all['resim']->getclientoriginalextension();
                $all['resim']->move(public_path('/images/stoklar'),$resimyolu);
                $all['resim']="/images/stoklar/".$resimyolu;
            }
            $stokveri=new update;
            $stokveri->stokupd($all,$request); 
            
            if ($stokveri) {
                return redirect()->back()->with('status','İşlem Başarılı');
            }
            else{
                return redirect()->back()->with('status','İşlem Başarısız');
            }
    }


    public function katalogprint(){
        $data['prints']=cari::all();
        return view('admin.cari.katalog',$data);
    }
    
    public function dedit($id){
        $data=Stok::find($id);
        return response()->json($data);
    }

    public function stdepoins(Request $request){
        $all=$request->except('_token');
        $evr=Sayac::wheredphrevrak('EVR')->get();
        $evrkod=$evr[0]['dphrevrak'].$evr[0]['dphrevrakno']+1;


        $dpinsert=new Depohareket;
        $dpinsert->evrakno=$evrkod;
        $dpinsert->hareket=$all['hareket'];
        $dpinsert->hareketturu=$all['hareket'];
        $dpinsert->urunid=$all['urunid'];
        $dpinsert->depoid=$all['depoid'];
        $dpinsert->miktar=$all['miktar'];
        $dpinsert->birimfiyat=$all['fiyat'];
        $dpinsert->toplamfiyat=$all['fiyat'] * $all['miktar'];
        $dpinsert->birimid=$all['birimid'];
        $dpinsert->aciklama=$all['aciklama'];
        $dpinsert->save();
        $sayacsave=Sayac::wheredphrevrak('EVR')->update(['dphrevrakno'=>$evr[0]['dphrevrakno']+1]);

        if ($dpinsert) {
            return redirect()->back()->with('status','İşlem Başarılı');
        }
        else{
            return redirect()->back()->with('status','İşlem Başarısız');
        }
    }

    
    public function delete($id){
        $data=Stok::find($id);
        $grupcounts=Depohareket::whereurunid($id)->count();
        if ($grupcounts==0) {
            @$resimyol=public_path(@$data['resim']);
            @unlink(@$resimyol);
            $data->delete();
            return response()->json($data);    
        }
        elseif($grupcounts>0){
            return response()->json(error); 
        }
    }

    public function depomiktars($id){
        $datas=Depohareket::stokurundepo($id);
        return response()->json($datas);
    }

    public function depomiktarcikans($id){
        $datascik=Depohareket::stokuruncikandepo($id);
        return response()->json($datascik);
    }

    public function respnsealsat($ids,$alsatValue){
        $alsats=Stok::find($ids);
        return response()->json($alsats);
    }

    public function exportCari() {
        return Excel::download(new CariExport, 'cari.xlsx');
    }

    public function importCari(Request $request){
        try {
            Excel::import(new CariImport,  $request->file('file'));
            return redirect()->back()->with('status','İşlem Başarılı');
        } catch (Exception $e) {
            return $e;
        }
        

        
    }
}
