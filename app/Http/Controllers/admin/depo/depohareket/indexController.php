<?php

namespace App\Http\Controllers\admin\depo\depohareket;
use App\Models\Depohareket;
use App\Models\Depo;
use App\Http\Controllers\Controller;
use App\Functions\search;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index(){
        $data['liste']=Depohareket::orderby('created_at','asc')->paginate(20);
        $data['depos']=Depohareket::select('depoid')->groupby('depoid')->get();
        $data['depoo']=Depo::all();
        $data['hrturu']=Depohareket::select('hareketturu')->groupby('hareketturu')->get();
        return view('admin.depo.depohareket.index',$data);
    }

    public function edit($id){
        $data['markagetir']=Marka::find($id);
        return view('admin.stok.edit',$data);
    }

    public function sgruppost(Request $request){
        $c=Marka::wheremarkaadi($request->markaadi)->count();
         if($c==0) {
            Marka::create(['markaadi'=>$request->markaadi]);
            return response()->json(['success'=>'Başarılı']);
        }
       
    }

    public function dhsearch(Request $request){
        $all=$_GET;
        $stearch= new search;
        return $stearch->dphsearch($all);
    }

    public function respnse($id){
        $data=Marka::find($id);
        return response()->json($data);
    }

    public function update(Request $request){
        $all=$request->except('_token');
        $all['toplamfiyat']=$all['miktar'] * $all['birimfiyat'];
        $c=Depohareket::whereevrakno($request->evrakno)->count();
        $update=Depohareket::whereid($request->id)->update($all);
        if ($update) {
            return redirect()->back()->with('status','İşlem Başarılı');
        }
        else{
            return redirect()->back()->with('status','İşlem Başarısız');
        }
    }

    public function delete(Request $request){
     $deletes=Depohareket::whereid($request->id)->delete();
     if ($deletes) {
        return redirect()->back()->with('status','İşlem Başarılı');
    }
    else{
        return redirect()->back()->with('status','İşlem Başarısız');
    }

    }

    public function depohrgt($id){
        $dphrdata=Depohareket::find($id);
        return response()->json($dphrdata);
    }
}
