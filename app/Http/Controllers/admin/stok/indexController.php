<?php

namespace App\Http\Controllers\admin\stok;
use App\Models\Stok;
use App\Models\Stokgrup;
use App\Models\Stokbirim;
use App\Models\Marka;
use App\Models\Depo;
use App\Models\Depohareket;
use App\Models\Sayac;
use App\Functions\insert;
use App\Functions\update;
use App\Functions\search;
use File;
use Image;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\StokExport;
use App\Imports\StokImport;
use Maatwebsite\Excel\Facades\Excel;

class indexController extends Controller
{
    public function index(){
        $saycs=Sayac::where('stoksayac','>=','-1')->get();
        $data['sayackod']=$saycs[0]['stoksyadi'];
        $data['sayacs']=$saycs[0]['stoksayac']+1;
        $data['brkdtr']=rand(868,869).rand(1000000000,9999999999);
        $data['liste']=Stok::paginate(10);
        $data['stokgrups']=Stokgrup::orderby('grupadi','asc')->get();
        $data['stokbirim']=Stokbirim::orderby('birimadi','asc')->get();
        $data['stokdepo']=Depo::orderby('id','asc')->get();
        $data['marka']=Marka::orderby('markaadi','asc')->get();
        return view('admin.stok.index',$data);
    }

    public function store(Request $request){
        $all=$request->except('_token');
        $saartir=$all['sayacartir'];
        $c=Stok::wherestokkodu($all['stokkodu'])->count();
        if ($c==0) {
            if ($request->resim) {
                $resimyolu=$all['stokkodu'].'.'.$all['resim']->getclientoriginalextension();
                $all['resim']->move(public_path('/images/stoklar'),$resimyolu);
                $all['resim']="/images/stoklar/".$resimyolu;
            }
            $saycs=Sayac::where('stoksayac','>=','-1')->update(['stoksayac'=>$saartir]);    
            $stokveri=new insert;
            $stokveri->stokinst($all,$request); 
            
            if ($stokveri) {
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

    public function search(){
       $all=$_GET;
       $stearch= new search;
       return $stearch->stoksearch($all);
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
        $data['prints']=Stok::all();
        return view('admin.stok.katalog',$data);
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

    public function exportStok() {
        return Excel::download(new StokExport, 'stok.xlsx');
    }

    public function importStok(Request $request){
        try {
            Excel::import(new StokImport,  $request->file('file'));
            return redirect()->back()->with('status','İşlem Başarılı');
        } catch (Exception $e) {
            return $e;
        }
        

        
    }
}
