<?php

namespace App\Http\Controllers\admin\stok\stokbirim;
use App\Models\Stokbirim;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index(){
        $data['liste']=Stokbirim::orderby('birimadi','asc')->paginate(20);
        return view('admin.stok.stokbirim.index',$data);
    }

    public function sgruppost(Request $request){
        $c=Stokbirim::wherebirimadi($request->birimadi)->count();
         if($c==0) {
            Stokbirim::create(['birimadi'=>$request->birimadi]);
            return response()->json(['success'=>'Başarılı']);
        }
       
    }

    public function bsearch(Request $request){
        $serc=@$_GET['brmnme'];
        $sirala=@$_GET['sira'];
        if ($sirala==1) {
            $duzsirala="ASC";
        }
        elseif ($sirala==2) {
            $duzsirala="DESC";
        }
        $data['liste']=Stokbirim::where('birimadi','like','%'.$serc.'%')->orderby('birimadi',$duzsirala)->paginate(20);
        $data['liste']->appends($request->all()); 
        return view('admin.stok.stokbirim.search',$data);
    }

    public function respnse($id){
        $data=Stokbirim::find($id);
        return response()->json($data);
    }

    public function update(Request $request){
        $all=$request->except('_token');
        $c=Stokbirim::wherebirimadi($request->birimadi)->count();
        if ($c!=1) {
            $update=Stokbirim::whereid($request->id)->update($all);
            if ($update) {
                return redirect()->back()->with('status','Güncelleme İşlemi Başarılı');
            }
        }
        else if($c==1){
            return redirect()->back()->with('status','Bu veri sisteme önceden kayıt edilmiş');
        }
    }

    public function delete($id){
        $dlts=Stokbirim::find($id);
        $birimcounts=Stok::stoksayisibirim($id);
        if ($birimcounts==0) {
            $dlts->delete();
            return response()->json($dlts);    
        }
        elseif($grupcounts>0){
            return response()->json(error); 
        }

    }

    
}
