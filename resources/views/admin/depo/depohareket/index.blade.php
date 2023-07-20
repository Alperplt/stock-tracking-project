@extends('layouts.admin.homepage')
@section('title','Depo Hareketleri')
@section('header')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

@section('content')
<input type="hidden" value="{{$sayac=1}}">

<div class="col-12">
  <form action="{{route('admin.depohareket.depohareketsearch')}}" type="get">
    <div class="row justify-content-center border pt-3" style="font-size:0.3rem">
    <div class="col-md-2 text-center mx-2 my-1">
            <label for="">Evrak No</label>
            <input type="text" placeholder="Evrak no ile ara.." value="{{@$_GET['evraknos']}}" name="evrakno" class="form-control h-25 text-center">
        </div>

        <div class="col-md-2 text-center mx-2 my-1">
            <label for="">Hareket</label>
            <select name="harekettipi" class="form-control text-center grupara"  style="padding:0px; height: 21px;">
                <option value="" >Seçim Yapınız..</option>
                <option value="1">Giriş</option>
                <option value="0">Çıkış</option>
            </select>
        </div>

        <div class="col-md-3 text-center mx-2 my-1">
            <label for="">Stok Kodu</label>
            <input type="text" placeholder="Stok kodu ile ara.." value="{{@$_GET['stokadi']}}" name="stokkodu" class="form-control h-25 text-center">
        </div>

        <div class="col-md-3 text-center mx-2 my-1">
             <label for="">Depo Adı</label><br>
            <select data-live-search="true" name="depo"  class="urunaddselects gruparatikis form-control" style="padding:0px; height: 21px;">
               <option data-tokens="ketchup mustard"  class="text-center" value="">Seçim Yapınız..</option>
               @foreach($depos as $dps)
                <option data-tokens="ketchup mustard"  class="text-center" value="{{$dps->depoid}}">{{App\Models\Depo::depoadis($dps->depoid)}}</option>
               @endforeach
            </select>
        </div>
        


        <div class="col-md-3 text-center mx-2 my-1">
            <label for="">Başlangıç Tar.</label>
            <input type="date" name="bastarih" class="form-control h-25 text-center">
        </div>

        <div class="col-md-3 text-center mx-2 my-1">
            <label for="">Bitiş Tar.</label>
            <input type="date"  name="bittarih" class="form-control h-25 text-center">
        </div>

        <div class="col-md-2 text-center mx-2 my-1">
             <label for="">Hareket Tipi</label><br>
            <select data-live-search="true" name="hrktturu"   class="urunaddselects gruparatikis form-control" style="padding:0px; height: 21px;">
               <option data-tokens="ketchup mustard"  class="text-center" value="">Seçim Yapınız..</option>
               @foreach(@$hrturu as $hrkt)
                <option data-tokens="ketchup mustard"  class="text-center" value="{{$hrkt->hareketturu}}">{{App\Models\Depohareket::hareketturuno($hrkt->hareketturu)}}</option>
               @endforeach
            </select>
        </div>

        <div class="col-12 col-md-2 my-1">
              <button class="btn btn-sm btn-primary my-4" title="Ara"><i class="fas fa-search"></i></button>
              <a href="/admin/depohareket" class="btn btn-sm btn-danger my-4" title="Temizle"><i class="fas fa-trash-alt"></i></a>
        </div>
       </form> 
 
    </div>
</div>

<div class="col-md-12 text-center">
            @if(session('status')=="İşlem Başarılı")
                <div class="alert alert-success p-1" style="height:40px;" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <p style="font-size:15px;">{{ session('status') }}</p>
                </div>
            @elseif(session('status')=="İşlem Başarısız")
             <div class="alert alert-danger p-1" style="height:40px;" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <p style="font-size:15px;">{{ session('status') }}</p>
              </div>
            
            @endif
</div>

<!-- LİST -->
<div class="col-md-12 m-0 p-0 table-responsive">
    <table class="table table-striped table-muted table-bordered text-center my-4" style="font-size:0.7rem;">

        <thead >
            <tr >
                <th class="text-center" scope="col">#</th>
                <th class="text-center" scope="col">Evrak No</th>
                <th class="text-center" scope="col">Hareket</th>
                <th class="text-center" scope="col">Stok Kodu</th>
                <th class="text-center" scope="col">Stok Adı</th>
                <th class="text-center" scope="col">Depo Adı</th>
                <th class="text-center" scope="col">Miktar(G)</th>
                <th class="text-center" scope="col">Miktar(Ç)</th>
                <th class="text-center" scope="col">Birim</th>
                <th class="text-center" scope="col">Birim F.</th>
                <th class="text-center" scope="col">Toplam F.</th>
                <th class="text-center" scope="col">Tarih</th>
                <th class="text-center" scope="col">Hareket Türü</th>
                <th class="text-center" scope="col">İşlemler</th>

            </tr>
        </thead>
        <tbody id="gruplist">
        @foreach($liste as $list)
            <input type="hidden" id="tarihs{{$list->id}}" value="{{date('Y-m-d',strtotime($list->created_at))}}">
            <tr id="sid{{$list->id}}" style="background-color:@if($list->hareket==1) #e4fbe4 @else #ffeded @endif">
                <td  class="align-middle">{{$sayac++}}</td>
                <td  class="align-middle">{{$list->evrakno}}</td>
                <td  class="align-middle">{{@App\Models\Depohareket::hareketno($list->hareket)}}</td>
                <td  class="align-middle" id="stkkod{{$list->id}}">{{@App\Models\stok::stokkod($list->urunid)}}</td>
                <td  class="align-middle" id="stkad{{$list->id}}">{{@App\Models\stok::stokadis($list->urunid)}}</td>
                <td  class="align-middle">{{@App\Models\depo::depoadis($list->depoid)}}</td>
                <td  class="align-middle">@if($list->hareket==1) {{$list->miktar}} @endif</td>
                <td  class="align-middle">@if($list->hareket==0) {{$list->miktar}} @endif</td>
                <td  class="align-middle">{{@App\Models\Stokbirim::brmnames($list->birimid)}}</td>
                <td  class="align-middle">{{number_format($list->birimfiyat,'2',',','.')}} ₺</td>
                <td  class="align-middle">{{number_format($list->toplamfiyat,'2',',','.')}} ₺</td>
                <td  class="align-middle">{{date('d.m.Y',strtotime($list->created_at))}}</td>
                <td  class="align-middle">{{App\Models\Depohareket::hareketturuno($list->hareketturu)}}</td>
                <td  class="align-middle" style="width: 149px;">
                    <a href="javascript:void(0)"   class="btn btn-warning p-1" onclick="dphrgnc({{$list->id}})" title="Düzenle" data-toggle="modal" data-target="#depohrgnc" style="margin: 0px 7px; display:@if($list->hareketturu>=2) none @endif"><i class="fas fa-pen"></i></a>
                    <a href="javascript:void(0)"  class="p-1 mx-2 btn" style="background-color:#312a6c; color:white; display:@if($list->hareketturu!=2) none @endif" title="Harekete Git" ><i class="fas fa-sort-amount-up"></i></a>
                    <a href="javascript:void(0)" onclick="silclick({{$list->id}})" value="{{$list->id}}"  class="btn btn-danger p-1" style="display:@if($list->hareketturu>=2) none @endif"  title="Sil" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-minus-circle"></i></a>
                </td>
            </tr>
        @endforeach
        
        </tbody>
            
        <tfoot>
            <tr style="background-color:#e2e9f3;">
            <input type="hidden" name="" value="{{$kalanmiktar= (App\Models\Depohareket::wherehareket(1)->sum('miktar')) - (App\Models\Depohareket::wherehareket(0)->sum('miktar'))}}" id="">
            <input type="hidden" name="" value="{{$kalantutar= (App\Models\Depohareket::wherehareket(0)->sum('toplamfiyat')) - (App\Models\Depohareket::wherehareket(1)->sum('toplamfiyat')) }}" id="">
                <td colspan="4" class="text-center bg-primary">Miktar</td>
                <td class="bg-success">Giren = {{@App\Models\Depohareket::wherehareket(1)->sum('miktar')}}</td>
                <td class="bg-danger">Çıkan = {{@App\Models\Depohareket::wherehareket(0)->sum('miktar')}}</td>
                <td colspan="2" class="text-white bg-@if($kalanmiktar>0)success @elseif($kalanmiktar==0)warning @elseif($kalanmiktar<0)danger @endif">Kalan = {{$kalanmiktar}}</td>
                <td colspan="3" class="bg-primary">Fiyat</td>
                <td class="bg-success">Giren = {{number_format(@App\Models\Depohareket::wherehareket(0)->sum('toplamfiyat'),'2',',','.')}} ₺</td>
                <td class="bg-danger">Çıkan = {{number_format(@App\Models\Depohareket::wherehareket(1)->sum('toplamfiyat'),2,',','.')}} ₺</td>
                <td class="text-white bg-@if($kalantutar>0)success @elseif($kalantutar==0)warning @elseif($kalantutar<0)danger @endif">Kalan = {{number_format($kalantutar,'2',',','.')}} ₺</td>
            </tr>
        </tfoot>
        
    </table>
    <div class="row justify-content-center">
        <div class="col-md-3">{{ $liste->links() }}</div>
    </div>
</div>
<!--END LİST -->


<!-- DEPO HAREKET GÜNCELLE -->
<div class="modal fade font-sizerem" id="depohrgnc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="max-width:100%; height: auto;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="list-icon feather feather-home"></i> HAREKET DÜZENLE</h5>
        <h5 class="modal-title" id="exampleModalLabel">Evrak No : <span id="evrnomtn"  class="text-success"></span></h5>
        <div class="row">
          </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="{{route('admin.depohareket.dphredit.post')}}" method="POST">
       @csrf
       <input type="hidden" id="ids" name="id">
       <input type="hidden" id="evrkk" name="evrakno">
       <input type="hidden" id="evrkk" name="toplamfiyat" value="0">
       <div class="row justify-content-center text-center">
            <div class="col-md-6">
                <label for="">Stok Kodu</label>
                <h6 id="stkodu">Stok kodu</h6>
            </div>
            <div class="col-md-6">
                <label for="">Stok Adı</label>
                <h6 id="stadi">Stok Adı</h6>
            </div>
       </div>
         <div class="col-md-12 my-3">
            <label for="">Hareket</label>
            <select name="hareket" id="harkt" class="form-control">
                <option value="">Seçiniz..</option>
                <option value="1">Giriş</option>
                <option value="0">Çıkış</option>
            </select>
          </div>

          <div class="col-md-12 my-3">
            <label for="">Depo Adı</label>
            <select name="depoid" id="dpoo" class="form-control">
                <option value="">Seçiniz..</option>
                @foreach($depoo as $dpo)
                    <option value="{{$dpo->id}}">{{$dpo->depoadi}}</option>
                @endforeach
            </select>
          </div>

          <div class="col-md-12 my-3">
            <label for="">Miktar</label>
            <input type="text" name="miktar" id="mktr" class="form-control text-center">
          </div>

          <div class="col-md-12 my-3">
            <label for="">Birim Fiyat</label>
            <input type="text" name="birimfiyat" id="brmfyt" class="form-control text-center">
          </div>

          <div class="col-md-12 my-3">
            <label for="">Tarih</label>
            <input type="date" name="created_at" id="trh" class="form-control text-center">
          </div>
       

      </div>
      <div class="modal-footer">
       <button type="submit" class="btn btn-primary">Kaydet</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Vazgeç</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- END DEPO HAREKET GÜNCELLE -->

<!-- SİLME İŞLEMİ -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Silme İşlemi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
         İlgili hareketi silmek istediğinizden emin misiniz ?
      </div>
      <div class="modal-footer">
       <form action="{{route('admin.depohareket.delete')}}" method="POST">
       @csrf
        <input type="hidden" id="silid" name="id">
        <button type="submit" class="btn btn-danger">Sil</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Vazgeç</button>
      </form>
      </div>
    </div>
  </div>
</div>
<!-- END SİLME İŞLEMİ -->


@endsection
@section('footer')
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>

<script name="depohrgncs">
   function dphrgnc(id){
       $.get('/admin/depohareket/depohareketgetir/'+id,function(dphrdata){
            $('#ids').val(dphrdata.id)
            $('#evrkk').val(dphrdata.evrakno)
            $('#evrnomtn').html(dphrdata.evrakno)
            $('#stkodu').html($('#stkkod'+id).html())
            $('#stadi').html($('#stkad'+id).html())
            $('#harkt').val(dphrdata.hareket)
            $('#dpoo').val(dphrdata.depoid)
            $('#mktr').val(dphrdata.miktar)
            $('#brmfyt').val(dphrdata.birimfiyat)
            $('#trh').val($('#tarihs'+id).val())
       });
   }

</script>

<script name="upalerts">
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove(); 
        });
    }, 800);
</script>

<script>
  function silclick(id){
     $('#silid').val(id);
  }
</script>


@endsection