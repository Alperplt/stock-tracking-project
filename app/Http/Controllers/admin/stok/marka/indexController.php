<?php

namespace App\Http\Controllers\admin\stok\marka;
use App\Models\Marka;
use App\Models\Stok;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index(){
        $data['liste']=Marka::orderby('markaadi','asc')->paginate(20);
        return view('admin.stok.marka.index',$data);
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

    public function msearch(Request $request){
        $serc=@$_GET['mrknme'];
        $sirala=@$_GET['sira'];
        if ($sirala==1) {
            $duzsirala="ASC";
        }
        elseif ($sirala==2) {
            $duzsirala="DESC";
        }
        $data['liste']=Marka::where('markaadi','like','%'.$serc.'%')->orderby('markaadi',$duzsirala)->paginate(20);
        $data['liste']->appends($request->all()); 
        return view('admin.stok.marka.search',$data);
    }

    public function respnse($id){
        $data=Marka::find($id);
        return response()->json($data);
    }

    public function update(Request $request){
        $all=$request->except('_token');
        $c=Marka::wheremarkaadi($request->markaadi)->count();
        if ($c!=1) {
            $update=Marka::whereid($request->id)->update($all);
            if ($update) {
                return redirect()->back()->with('status','Güncelleme İşlemi Başarılı');
            }
        }
        else if($c==1){
            return redirect()->back()->with('status','Bu veri sisteme önceden kayıt edilmiş');
        }
    }

    public function delete($id){
        $dlts=Marka::find($id);
        $grupcounts=Stok::stoksayisimarka($id);
        if ($grupcounts==0) {
            $dlts->delete();
            return response()->json($dlts);    
        }
        elseif($grupcounts>0){
            return response()->json(error); 
        }

    }
}
