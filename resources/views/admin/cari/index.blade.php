@extends('layouts.admin.homepage')
@section('title','Cari Tanımları')
@section('header')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">

@section('content')
<input type="hidden" value="{{$sayac=1}}">
<!-- ÜST MENÜ -->
<div class="col-md-12 my-3 ">
    <div class="row text-center">
        <div class="col-12 col-md-2">
            <button class="btn btn-sm  mx-2 my-1 px-4 form-control text-center"  style="background-color:#3eab3e; color:white;" data-toggle="modal" data-target="#yenicariekle"><i class="fas fa-plus mr-1 "></i>Yeni Cari Ekle</button>
        </div>

        <div class="col-12 col-md-2">
            <a href="{{route('admin.cari.crkatalogprint')}}" target="_blank" class="btn btn-sm  mx-2 my-1 px-4 form-control text-center" style="background-color:#6dd9f1; color:white;"><i class="fas fa-print mr-1"></i> Katalog Yazdır</a>
        </div>

        <div class="col-12 col-md-2">
            <a  href="{{route('admin.cari.export')}}" class="btn btn-sm  mx-1 my-1 px-4 form-control" style="background-color:#ffaa0f; color:white;"><i class="far fa-file-excel mr-1"></i>Excel İndir</a>
        </div>

        <div class="col-12 col-md-2">
            <button class="btn btn-sm  mx-1 my-1 px-4 form-control" style="background-color:#b71f1f; color:white;" data-toggle="modal" data-target="#importexcel"><i class="fas fa-file-excel mr-1"></i>Excelden Aktar</button>
        </div>       
    </div>
</div>
<!--END ÜST MENÜ -->

<!--SEARCH-->
<div class="col-12">
  <form action="{{route('admin.cari.carisearch')}}" type="get">
    <div class="row justify-content-center border pt-3" style="font-size:0.3rem">
    <div class="col-md-2 text-center mx-2 my-1">
            <label for="">Cari Kodu</label>
            <input type="text" placeholder="Cari kodu ile ara.." value="{{@$_GET['carikodu']}}" name="carikodu" class="form-control h-25 text-center">
        </div>
        
        <div class="col-md-3 text-center mx-2 my-1">
            <label for="">Cari Adı</label>
            <input type="text" placeholder="Cari adı ile ara.." value="{{@$_GET['cariadi']}}" name="cariadi" class="form-control h-25 text-center">
        </div>

        <div class="col-md-2 text-center mx-2 my-1">
            <label for="">Tc No</label>
            <input type="text" placeholder="Tc no ile ara.." value="{{@$_GET['tcno']}}" name="tcno" class="form-control h-25 text-center">
        </div>

        <div class="col-md-2 text-center mx-2 my-1">
            <label for="">Vergi No</label>
            <input type="text" placeholder="Vergi no ile ara.." value="{{@$_GET['vergino']}}" name="vergino" class="form-control h-25 text-center">
        </div>

        <div class="col-md-2 text-center mx-2 my-1">
            <label for="">Grubu</label>
            <select name="carigrubu" class="form-control text-center grupara"  style="padding:0px; height: 21px;">
                <option value="">Seçim Yapınız..</option>
                @foreach($carigrups as $crgrup)
                   <option data-tokens="ketchup mustard"  value="{{$crgrup->id}}" @if($crgrup->id==@$_GET['stokgrubu']) selected @endif  class="text-center" >{{$crgrup->grupadi}}</option>
                @endforeach
            </select>
        </div>


        <div class="col-md-2 text-center mx-2 my-1">
            <label for="">Ticari Unvan</label>
            <input type="text" placeholder="Ticari unvan ile ara.." value="{{@$_GET['ticariunvan']}}" name="ticariunvan" class="form-control h-25 text-center">
        </div>

        <div class="col-md-2 text-center mx-2 my-1">
            <label for="">Telefon</label>
            <input type="text" placeholder="Telefon no ile ara.." value="{{@$_GET['telefon']}}" name="telefon" class="form-control h-25 text-center">
        </div>

        <div class="col-md-2 text-center mx-2 my-1">
            <label for="">Özel  Kodu</label>
            <input type="text" placeholder="Özel kod ile ara.." value="{{@$_GET['ozelkod']}}" name="ozelkod" class="form-control h-25 text-center">
        </div>

        <div class="col-md-2 px-2 m-0 text-center  my-1">
            <label for="">Durum</label>
            <select name="durum" class="form-control text-center" style="padding:0px; height: 21px;">
                <option value="1" @if(@$_GET['durum']==1) selected @endif>Aktif</option>
                <option value="0" @if(@$_GET['durum']==0) selected @endif>Pasif</option>
                <option value="" @if(@$_GET['durum']=="") selected @endif>Hepsi</option>
            </select>
        </div>

        <div class="col-12 col-md-2 my-1">
              <button class="btn btn-sm btn-primary my-4" title="Ara"><i class="fas fa-search"></i></button>
              <a href="/admin/cari" class="btn btn-sm btn-danger my-4" title="Temizle"><i class="fas fa-trash-alt"></i></a>
        </div>
 
    </div>
</div>
<!--END SEARCH-->


<div class="col-md-12 text-center">
            @if(session('status')=="İşlem Başarılı")
                <div class="alert alert-success p-1" style="height:40px;" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <p style="font-size:15px;">{{ session('status') }}</p>
                </div>
            @elseif(session('status')=="Bu veri sisteme önceden kayıt edilmiş")
             <div class="alert alert-danger p-1" style="height:40px;" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <p style="font-size:15px;">{{ session('status') }}</p>
              </div>
            
            @endif
</div>
<!-- LİST -->
<div class="col-md-12 m-0 p-0 table-responsive">
    <table class="table table-striped table-muted table-bordered text-center " style="font-size:0.7rem;">
    <div class="float-left mt-2">
        <span class="font-sizerem ">Toplam Cari Sayısı :{{App\Models\Cari::count()}}</span>
    </div>
    <div class="col col-md-4 float-right my-2">
            <div class="row">
                <div class="col-md-10">
                    <select name="siralama" class="form-control  text-center" style="padding:0px; height: 21px;">
                        <option value="0" @if(@$_GET['siralama']==0) selected @endif>Kayıt Zamanına Göre Sırala</option>
                        <option value="1" @if(@$_GET['siralama']==1) selected @endif>Kayıt Zamanına Göre Tersten Sırala</option>
                        <option value="2" @if(@$_GET['siralama']==2) selected @endif>Cari Koduna Göre Sırala</option>
                        <option value="3" @if(@$_GET['siralama']==3) selected @endif>Cari Koduna Göre Tersten Sırala</option>
                        <option value="4" @if(@$_GET['siralama']==4) selected @endif>Cari Adına Göre Sırala</option>
                        <option value="5" @if(@$_GET['siralama']==5) selected @endif>Cari Adına Göre Tersten Sırala</option>
                        <option value="6" @if(@$_GET['siralama']==6) selected @endif>Aktif/Pasif Durumuna Göre Sırala</option>
                        <option value="7" @if(@$_GET['siralama']==7) selected @endif>Aktif/Pasif Durumuna Göre Tersten Sırala</option>
                        <option value="8" @if(@$_GET['siralama']==8) selected @endif>Gruba Göre Sırala</option>
                        <option value="9" @if(@$_GET['siralama']==9) selected @endif>Gruba Göre Tersten Sırala</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-sm btn-dark" title="Sırala"><i class="fas fa-sort"></i></button>
                </div>
            </div>
            </form>
        </div> 
        <thead >
            <tr >
            <th class="text-center" scope="col">Cari Kodu</th>
            <th class="text-center" scope="col">Cari Adı</th>
            <th class="text-center" scope="col">Grubu</th>
            <th class="text-center" scope="col">Tc/Vergi No</th>
            <th class="text-center" scope="col">Telefon</th>
            <th class="text-center" scope="col">Bakiye</th>
            <th class="text-center" scope="col">Alacak/Borç</th>
            <th class="text-center" scope="col">Durum</th>
            <th class="text-center" scope="col">İşlemler</th>
            </tr>
        </thead>
        <tbody>
            @foreach($liste as $list)
                <tr id="sid{{$list->id}}">
                    <td  id="stkod{{$list->id}}" class="align-middle">{{@$list->carikodu}}</td>
                    <td class="align-middle">{{@$list->cariadi}}</td>
                    <td  class="align-middle" >{{@\App\Models\Carigrubu::grpnames($list->carigrubu)}}</td>
                    <td  class="align-middle" >@if($list->tcno!=null && $list->vergino==null) {{$list->tcno}} @elseif($list->tcno==null && $list->vergino!=null) {{$list->vergino}} @else  @endif</td>
                    <td class="align-middle">{{@$list->telefon}}</td>
                    <td  class="align-middle" id="hrkets{{$list->id}}" style="background-color:#fffbea;">100.00 ₺</td>
                    <td class="align-middle">Alacak</td>
                    <td >
                        <input type="checkbox" status-id="{{$list->id}}" class="switch" @if(@$list->durum==1) checked @endif data-toggle="toggle" data-size="xs" data-on="Aktif" data-off="Pasif" data-onstyle="success" data-offstyle="danger">
                    </td>
                    <td  class="align-middle">
                        <a href="javascript:void(0)" onclick="upt({{$list->id}})" class="btn btn-warning p-1" title="Düzenle" data-toggle="modal" data-target="#stokguncelles"><i class="fas fa-pen"></i></a>
                        <a href="javascript:void(0)" onclick="depupt({{$list->id}})" class="btn btn-dark p-1 mx-1" title="Hareket İşlemleri" data-toggle="modal" data-target="#stokhareketislemleri"><i class="fas fa-cubes"></i></button>
                        <a href="javascript:void(0)" onclick="delets({{$list->id}})" class="btn btn-danger p-1" title="Sil"><i class="fas fa-minus-circle"></i></button>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>
    <div class="row justify-content-center">
        <div class="text-center">{{ $liste->appends($_GET)->links() }}</div>
    </div>
</div>
<!--END LİST -->

<!-- YENİ CARİ EKLE MODAL -->
<div class="modal fade font-sizerem" style="overflow-y:scroll;" id="yenicariekle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="max-width:100%; height: auto;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus mr-1 "></i> Yeni Cari Ekle</h5>
          <div class="row">
              <a href="/admin/cari/grup" target="_blank" class="btn btn-sm btn-circle text-white mx-1 my-1" title="Gruplara Git" style="background-color: #00c4ff;"><i class="fas fa-layer-group"></i></a>
          </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('admin.cari.create.post')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                    <label for="" class="ml-2">Cari Resmi</label>
                    <input type="file" name="image" class="form-control">
            </div>

            <div class="row my-3">
                <div class="col-md-6">
                    <label for="" class="ml-2">Cari Kodu</label><br>
                    <input type="text" name="carikodu" value="{{$sayackod.$sayacs}}" required class="form-control inputsheight" >
                    <input type="hidden" name="sayacartir" value="{{$sayacs}}">
                </div>

                <div class="col-md-6">
                    <label for="" class="ml-2">Ticari Unvan</label><br>
                    <input type="text" name="ticariunvan" class="form-control inputsheight">
                </div>
            </div>



            <div class="row my-2">
                 <div class="col-md-6">
                    <label for="" class="ml-2">Cari Ad</label><br>
                    <input type="text" name="cariadi" class="form-control inputsheight">
                 </div>

                 <div class="col-md-6">
                    <label for="" class="ml-2">Cari Soyad</label><br>
                    <input type="text" name="carisoyadi"  class="form-control inputsheight">
                 </div>
            </div>

            <div class="row my-2">
                 <div class="col-md-6">
                    <label for="" class="ml-2">Tc No</label><br>
                    <input type="text" name="tcno"  class="form-control inputsheight">
                 </div>

                 <div class="col-md-6">
                    <label for="" class="ml-2">Vergi No</label><br>
                    <input type="text" name="vergino" class="form-control inputsheight">
                 </div>
            </div>


            <div class="row my-3">
                 <div class="col-md-6">
                      <label for="" class="ml-2">Grubu</label><br>
                        <div class="search_select_box bg-muted border text-dark marks">
                          <select data-live-search="true" name="carigrubu" id="markbir" required class="urunaddselects">
                          <option data-tokens="ketchup mustard"  class="text-center" value="">Seçiniz...</option>
                            @foreach($carigrups as $grups)
                              <option data-tokens="ketchup mustard"  class="text-center"  value="{{$grups->id}}">{{$grups->grupadi}}</option>
                            @endforeach
                          </select>
                       </div>
                 </div>

                 <div class="col-md-6">
                    <label for="" class="ml-2">Özel Kodu</label><br>
                    <input type="text" name="ozelkod" class="form-control" style="height:37px;">
                 </div>
            </div>

            <div class="row my-2">
                 <div class="col-md-6">
                    <label for="" class="ml-2">Telefon</label><br>
                    <input type="text" name="telefon" class="form-control inputsheight">
                 </div>

                 <div class="col-md-6">
                    <label for="" class="ml-2">Mail</label><br>
                    <input type="text" name="email" class="form-control inputsheight">
                 </div>
               
            </div>

            <div class="row my-2">
                 <div class="col-md-12">
                    <label for="" class="ml-2">Adres</label><br>
                    <textarea name="adres" class="form-control" id="" cols="30" rows="2"></textarea>
                 </div>
            </div>

      </div>
      <div class="modal-footer">
       <button type="submit"  class="btn btn-primary">Kaydet</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Vazgeç</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- END YENİ STOK EKLE MODAL -->

<!-- CARİ GÜNCELLE -->
<div class="modal fade font-sizerem" style="overflow-y:scroll;" id="stokguncelles" tabindex="-5" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="max-width:100%; height: auto;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-pen"></i> Cari Düzenle</h5>
          <div class="row">
              <button class="btn btn-sm btn-circle text-white mx-1 my-1" title="Grup Ekle" style="background-color: #00c4ff;" data-toggle="modal" data-target="#grupekle"><i class="fas fa-layer-group"></i></button>
          </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="">
           <div class="row">
              <h6 style="margin: 0px 40%;">(CR0001)</h4>
           </div>
            
           <div class="row">
                    <img src="../images/yok.png" alt="">
                    <label for="">Cari Resmi</label>
                    <input type="file" class="form-control ">
            </div>

            <div class="row my-3">
                <div class="col-md-6">
                    <label for="">Cari Kodu</label><br>
                    <input type="text" class="form-control inputsheight">
                </div>

                <div class="col-md-6">
                    <label for="">Yetkili Ad-Soyad</label><br>
                    <input type="text" class="form-control inputsheight">
                </div>
            </div>

            <div class="row my-3">
                <div class="col-md-12">
                    <label for="">Ticari Ünvanı</label><br>
                    <input type="text" class="form-control inputsheight">
                </div>
            </div>

            <div class="row my-3">
                 <div class="col-md-6">
                    <label for="">Telefon</label><br>
                    <input type="text" class="form-control inputsheight">
                 </div>
                <div class="col-md-6">
                    <label for="">E-MAİL</label><br>
                    <input type="email" class="form-control inputsheight">
                </div>
            </div>

            <div class="row my-3">
                <div class="col-md-12">
                    <label for="">Grubu</label><br>
                      <div class="search_select_box bg-muted border text-dark">
                         <select data-live-search="true" class="form-control text-center">
                             <option data-tokens="ketchup mustard">TEDARİKÇİ</option>
                             <option data-tokens="mustard">ALICI</option>
                         </select>
                      </div>
                </div>
            </div>

            <div class="row my-3">
                <div class="col-md-12">
                    <label for="">Adres</label><br>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="" id="" cols="30" rows="10" style="height:61px;"></textarea>
                </div>
            </div>

       </form>

      </div>
      <div class="modal-footer">
       <button type="button" class="btn btn-primary">Kaydet</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Vazgeç</button>
      </div>
    </div>
  </div>
</div>
<!-- CARİ GÜNCELLE -->

<!-- EXCELDEN AKTAR -->
<div class="modal fade font-sizerem" id="importexcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="max-width:100%; height: auto;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-file-excel mr-1"></i> EXCELDEN AKTAR</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="{{route('admin.cari.import')}}" method="POST" enctype="multipart/form-data">
       @csrf
          <label for="">Dosya Adı</label>
          <input type="file" name="file" class="form-control">
       

      </div>
      <div class="modal-footer">
       <button type="submit" class="btn btn-primary">Kaydet</button>
       </form>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Vazgeç</button>
      </div>
    </div>
  </div>
</div>
<!-- END EXCELDEN AKTAR -->



@endsection
@section('footer')
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<script src="{{asset('admins/assets/js/islemler.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script names="switchs">
    $(function switchs(){
        $('.switch').change(function(){
          id= $(this)[0].getAttribute('status-id');
          statu= $(this).prop('checked');
          $.get("{{route('admin.stok.switch')}}", {id:id, durum:statu}, function(data, status){
                console.log(data);
          });
        })
    })
</script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>
 <script>
     $('document').ready(function(){
        $('.search_select_box select').selectpicker();
     });
 </script>
@endsection