<?php

namespace App\Http\Controllers\admin\stok\stokgrup;
use App\Models\Stokgrup;
use App\Models\Altgrup;
use App\Models\Stok;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index(){
        $data['liste']=Stokgrup::orderby('grupadi','asc')->paginate(20);
        $data['altgr']=Altgrup::all();
        return view('admin.stok.stokgrup.index',$data);
    }

    public function edit($id){
        $data['grupgetir']=Stokgrup::find($id);
        return view('admin.stok.edit',$data);
    }

    public function sgruppost(Request $request){
        $c=Stokgrup::wheregrupadi($request->grupadi)->count();
         if($c==0) {
            Stokgrup::create(['grupadi'=>$request->grupadi]);
            return response()->json(['success'=>'Başarılı']);
        }
       
    }

    public function search(Request $request){
        $serc=@$_GET['grpnme'];
        $sirala=@$_GET['sira'];
        if ($sirala==1) {
            $duzsirala="ASC";
        }
        elseif ($sirala==2) {
            $duzsirala="DESC";
        }
        $data['liste']=Stokgrup::where('grupadi','like','%'.$serc.'%')->orderby('grupadi',$duzsirala)->paginate(20);
        $data['liste']->appends($request->all()); 
        return view('admin.stok.stokgrup.search',$data);
    }

    public function respnse($id){
        $data=Stokgrup::find($id);
        return response()->json($data);
    }

    public function update(Request $request){
        $all=$request->except('_token');
        $c=Stokgrup::wheregrupadi($request->grupadi)->count();
        if ($c!=1) {
            $update=Stokgrup::whereid($request->id)->update($all);
            if ($update) {
                return redirect()->back()->with('status','Güncelleme İşlemi Başarılı');
            }
        }
        else if($c==1){
            return redirect()->back()->with('status','Bu veri sisteme önceden kayıt edilmiş');
        }
    }

    public function delete($id){
        $dlts=Stokgrup::find($id);
        $grupcounts=Stok::stoksayisigrup($id);
        if ($grupcounts==0) {
            $dlts->delete();
            return response()->json($dlts);    
        }
        elseif($grupcounts>0){
            return response()->json(error); 
        }

    }

    public function altgrrespnse($id){
        $altdata=Altgrup::wherekategoriid($id)->get();
        return response()->json($altdata);
    }


    public function altsgruppost(Request $request){
        $c=Altgrup::wherealtgrupadi($request->altgrupadi)->count();
         if($c==0) {
            Altgrup::create(['kategoriid'=>$request->kategoriid,'altgrupadi'=>$request->altgrupadi]);
            return response()->json(['success'=>'Başarılı']);
        }
       
    }

    public function altgrduzrespnse($id){
        $altdzdata=Altgrup::find($id);
        return response()->json($altdzdata);
    }


    public function altupdate(Request $request){
        $all=$request->except('_token');
        $c=Altgrup::wherealtgrupadi($request->altgrupadi)->count();
        if ($c==0) {
            $update=Altgrup::whereid($request->id)->update($all);
            if ($update) {
                return redirect()->back()->with('status','Güncelleme İşlemi Başarılı');
            }
        }
        else if($c>=1){
            return redirect()->back()->with('status','Bu veri sisteme önceden kayıt edilmiş');
        }
    }

    public function altdelete($id){
        $dlts=Altgrup::find($id);
        $grupcounts=Stok::stoksayisialtgrup($id);
        if ($grupcounts==0) {
            $dlts->delete();
            return response()->json($dlts);    
        }
        elseif($grupcounts>0){
            return response()->json(error); 
        }

    }

    public function grupaltsgruppost(Request $request){
        $myoption='<option value="0" class="text-center">Seçim Yapınız..</option>';
        $altgr=Altgrup::wherekategoriid($request->kategoriid)->get();
        foreach ($altgr as $key => $value) {
            $myoption.="<option value='".$value->id."' class='text-center'>".$value->altgrupadi."</option>";
        }
        return $myoption;
    }

    public function grupaltsgrupget($id){
        $sdata=Altgrup::wherekategoriid($id)->get();
        return response()->json($sdata);
    }

}
