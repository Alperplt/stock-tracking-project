<?php

namespace App\Http\Controllers\admin\depo;
use App\Models\Depo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index(){
        $data['liste']=Depo::orderby('depoadi','asc')->paginate(10);
        return view('admin.depo.index',$data);
    }

    public function sgruppost(Request $request){
        $c=Depo::wheredepoadi($request->depoadi)->count();
         if($c==0) {
            Depo::create(['depoadi'=>$request->depoadi]);
            return response()->json(['success'=>'Başarılı']);
        }
       
    }

    public function respnse($id){
        $data=Depo::find($id);
        return response()->json($data);
    }

    public function update(Request $request){
        $all=$request->except('_token');
        $c=Depo::wheredepoadi($request->depoadi)->count();
        if ($c!=1) {
            $update=Depo::whereid($request->id)->update($all);
            if ($update) {
                return redirect()->back()->with('status','Güncelleme İşlemi Başarılı');
            }
        }
        else if($c==1){
            return redirect()->back()->with('status','Bu veri sisteme önceden kayıt edilmiş');
        }
    }

    public function delete($id){
        $dlts=Depo::find($id);
        $dlts->delete();
        return response()->json($dlts);
    }

    public function search(Request $request){
        $serc=@$_GET['dpnme'];
        $sirala=@$_GET['sira'];
        if ($sirala==1) {
            $duzsirala="ASC";
        }
        elseif ($sirala==2) {
            $duzsirala="DESC";
        }
        $data['ara']=Depo::where('depoadi','like','%'.$serc.'%')->orderby('depoadi',$duzsirala)->paginate(20);
        $data['ara']->appends($request->all()); 
        return view('admin.depo.search',$data);
    }

    public function katalogprint(){
        $data['prints']=Depo::all();
        return view('admin.depo.katalog',$data);
    }
}
