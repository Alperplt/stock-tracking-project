@extends('layouts.admin.homepage')
@section('title','Stok Tanımları')
@section('header')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">

@section('content')
<input type="hidden" value="{{$sayac=1}}">
<!-- ÜST MENÜ -->
<div class="col-md-12 my-3 ">
    <div class="row text-center">
        <div class="col-12 col-md-2">
            <button class="btn btn-sm  mx-2 my-1 px-4 form-control text-center"  style="background-color:#3eab3e; color:white;" data-toggle="modal" data-target="#yenistokekle"><i class="fas fa-plus mr-1 "></i>Yeni Stok Ekle</button>
        </div>

        <div class="col-12 col-md-2">
            <a href="{{route('admin.stok.katalogprint')}}" target="_blank" class="btn btn-sm  mx-2 my-1 px-4 form-control text-center" style="background-color:#6dd9f1; color:white;"><i class="fas fa-print mr-1"></i> Katalog Yazdır</a>
        </div>

        <div class="col-12 col-md-2">
            <a  href="{{route('admin.stok.export')}}" class="btn btn-sm  mx-1 my-1 px-4 form-control" style="background-color:#ffaa0f; color:white;"><i class="far fa-file-excel mr-1"></i>Excel İndir</a>
        </div>

        <div class="col-12 col-md-2">
            <button class="btn btn-sm  mx-1 my-1 px-4 form-control" style="background-color:#b71f1f; color:white;" data-toggle="modal" data-target="#importexcel"><i class="fas fa-file-excel mr-1"></i>Excelden Aktar</button>
        </div>       
    </div>
</div>
<!--END ÜST MENÜ -->

<!--SEARCH-->
<div class="col-12">
  <form action="{{route('admin.stok.stoksearch')}}" type="get">
    <div class="row justify-content-center border pt-3" style="font-size:0.3rem">
    <div class="col-md-2 text-center mx-2 my-1">
            <label for="">Stok Kodu</label>
            <input type="text" placeholder="Stok kodu ile ara.." value="{{@$_GET['stokkodu']}}" name="stokkodu" class="form-control h-25 text-center">
        </div>
        
        <div class="col-md-3 text-center mx-2 my-1">
            <label for="">Stok Adı</label>
            <input type="text" placeholder="Stok adı ile ara.." value="{{@$_GET['stokadi']}}" name="stokadi" class="form-control h-25 text-center">
        </div>

        <div class="col-md-2 text-center mx-2 my-1">
            <label for="">Grubu</label>
            <select name="stokgrubu" class="form-control text-center grupara"  style="padding:0px; height: 21px;">
                <option value="">Seçim Yapınız..</option>
                @foreach($stokgrups as $stgrup)
                   <option data-tokens="ketchup mustard"  value="{{$stgrup->id}}" @if($stgrup->id==@$_GET['stokgrubu']) selected @endif  class="text-center" >{{$stgrup->grupadi}}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-2 text-center mx-2 my-1">
             <label for="">Alt Grup</label><br>
            <select data-live-search="true" name="stokaltgrubu"   class="urunaddselects gruparatikis form-control" style="padding:0px; height: 21px;">
                <option data-tokens="ketchup mustard"  class="text-center" value="">Seçim Yapınız..</option>
            </select>
        </div>
        

        <div class="col-md-2 text-center mx-2 my-1">
            <label for="">Marka</label>
            <select name="marka" class="form-control text-center" style="padding:0px; height: 21px;">
              <option value="">Seçim Yapınız..</option>
               @foreach($marka as $markas)
                  <option data-tokens="ketchup mustard"  class="text-center" value="{{$markas->id}}" @if($markas->id==@$_GET['marka']) selected @endif>{{$markas->markaadi}}</option>
               @endforeach
            </select>
        </div>

        <div class="col-md-2 text-center mx-2 my-1">
            <label for="">Barkodu</label>
            <input type="text" placeholder="Barkod ile ara.." value="{{@$_GET['barkodu']}}" name="barkodu" class="form-control h-25 text-center">
        </div>

        <div class="col-md-2 text-center mx-2 my-1">
            <label for="">Özel  Kodu</label>
            <input type="text" placeholder="Özel kod ile ara.." value="{{@$_GET['ozelkodu']}}" name="ozelkodu" class="form-control h-25 text-center">
        </div>

        <div class="col-md-2 text-center mx-2 my-1">
            <label for="">Birimi</label>
            <select name="birimi" class="form-control text-center" style="padding:0px; height: 21px;">
                <option value="">Seçim Yapınız..</option>
                @foreach($stokbirim as $stgbrm)
                   <option data-tokens="ketchup mustard"  class="text-center" value="{{$stgbrm->id}}" @if($stgbrm->id==@$_GET['birimi']) selected @endif>{{$stgbrm->birimadi}}</option>
                @endforeach
            </select>
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
              <a href="/admin/stok/stokssearch?stokkodu=&stokadi=&stokgrubu=&stokaltgrubu=&marka=&barkodu=&ozelkodu=&birimi=&durum=&siralama=0" class="btn btn-sm btn-danger my-4" title="Temizle"><i class="fas fa-trash-alt"></i></a>
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
        <span class="font-sizerem ">Toplam Stok Sayısı :{{$sara->count()}}</span>
    </div>
    <div class="col col-md-4 float-right my-2">
            <div class="row">
                <div class="col-md-10">
                    <select name="siralama" class="form-control  text-center" style="padding:0px; height: 21px;">
                        <option value="0" @if(@$_GET['siralama']==0) selected @endif>Kayıt Zamanına Göre Sırala</option>
                        <option value="1" @if(@$_GET['siralama']==1) selected @endif>Kayıt Zamanına Göre Tersten Sırala</option>
                        <option value="2" @if(@$_GET['siralama']==2) selected @endif>Stok Koduna Göre Sırala</option>
                        <option value="3" @if(@$_GET['siralama']==3) selected @endif>Stok Koduna Göre Tersten Sırala</option>
                        <option value="4" @if(@$_GET['siralama']==4) selected @endif>Stok Adına Göre Sırala</option>
                        <option value="5" @if(@$_GET['siralama']==5) selected @endif>Stok Adına Göre Tersten Sırala</option>
                        <option value="6" @if(@$_GET['siralama']==6) selected @endif>Aktif/Pasif Durumuna Göre Sırala</option>
                        <option value="7" @if(@$_GET['siralama']==7) selected @endif>Aktif/Pasif Durumuna Göre Tersten Sırala</option>
                        <option value="8" @if(@$_GET['siralama']==8) selected @endif>Satış Fiyatına Göre Sırala</option>
                        <option value="9" @if(@$_GET['siralama']==9) selected @endif>Satış Fiyatına Göre Tersten Sırala</option>
                        <option value="10" @if(@$_GET['siralama']==10) selected @endif>Alış Fiyatına Göre Sırala</option>
                        <option value="11" @if(@$_GET['siralama']==11) selected @endif>Alış Fiyatına Göre Tersten Sırala</option>
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
            <th class="text-center" scope="col">Stok Kodu</th>
            <th class="text-center" scope="col">Stok Adı</th>
            <th class="text-center" scope="col">Grubu</th>
            <th class="text-center" scope="col">Alt Grubu</th>
            <th class="text-center" scope="col">Marka</th>
            <th class="text-center" scope="col">Alış Fiyatı</th>
            <th class="text-center" scope="col">Perakende Satış</th>
            <th class="text-center" scope="col">Toptan Satış</th>
            <th class="text-center" scope="col">Stok Miktarı</th>
            <th class="text-center" scope="col">Birim</th>
            <th class="text-center" scope="col">Durum</th>
            <th class="text-center" scope="col">İşlemler</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ara as $list)
                <tr id="sid{{$list->id}}">
                    <td  id="stkod{{$list->id}}" class="align-middle">{{@$list->stokkodu}}</td>
                    <td class="align-middle">{{@$list->stokadi}}</td>
                    <td  class="align-middle" id="grpts{{$list->id}}">{{@\App\Models\Stokgrup::grpnames($list->grubu)}}</td>
                    <td  class="align-middle" id="altgrpts{{$list->id}}">{{@\App\Models\Altgrup::grpnames($list->altgrubu)}}</td>
                    <td  class="align-middle" id="marka{{$list->id}}">{{@\App\Models\Marka::brmnames($list->marka)}}</td>
                    <td  class="align-middle" style="background-color:#fff2f2;">{{number_format(@$list->alisfiyati,4,',','.')}} ₺</td>
                    <td  class="align-middle" style="background-color:#f3fff9;">{{number_format(@$list->perakendesatis,4,',','.')}} ₺</td>
                    <td  class="align-middle" style="background-color:#efeff1;">{{number_format(@$list->vadelisatis,4,',','.')}} ₺</td>
                    <td  class="align-middle" id="hrkets{{$list->id}}" style="background-color:#fffbea;">{{@App\Models\Depohareket::sumHr($list->id)}}</td>
                    <td  class="align-middle" id="birimts{{$list->id}}">{{@\App\Models\Stokbirim::brmnames($list->birimi)}}</td>
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
        <div class="text-center">{{ $ara->appends($_GET)->links() }}</div>
    </div>
</div>

<!--END LİST -->

<!-- YENİ STOK EKLE MODAL -->
<div class="modal fade font-sizerem" style="overflow-y:scroll;" id="yenistokekle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="max-width:100%; height: auto;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus mr-1 "></i> Yeni Stok Ekle</h5>
          <div class="row">
              <a href="/admin/stok/grup" target="_blank" class="btn btn-sm btn-circle text-white mx-1 my-1" title="Gruplara Git" style="background-color: #00c4ff;"><i class="fas fa-layer-group"></i></a>
              <a href="/admin/stok/marka" target="_blank" class="btn btn-sm btn-circle text-white mx-1 my-1" title="Markalara Git" style="background-color: #25971e;"><i class="fa-regular fa-clone"></i></a>
              <a href="/admin/stok/birim" target="_blank" class="btn btn-sm btn-circle text-white mx-1 my-1"   title="Birimlere" style="background-color: #f73d45"><i class="fab fa-unity"></i></a>
          </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('admin.stok.create.post')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                    <label for="">Stok Resmi</label>
                    <input type="file" name="resim" class="form-control">
            </div>

            <div class="row my-3">
                <div class="col-md-6">
                    <label for="">Stok Kodu</label><br>
                    <input type="text" name="stokkodu" value="{{$sayackod.$sayacs}}" required class="form-control inputsheight" >
                    <input type="hidden" name="sayacartir" value="{{$sayacs}}">
                </div>

                <div class="col-md-6">
                    <label for="">Barkodu</label><br>
                    <input type="text" name="barkodu" value="{{$brkdtr}}" class="form-control inputsheight">
                </div>
            </div>

            <div class="row my-3">
                <div class="col-md-12">
                    <label for="">Stok Adı</label><br>
                    <input type="text" name="stokadi" required class="form-control inputsheight">
                </div>
            </div>

            <div class="row my-2">
                 <div class="col-md-6">
                        <label for="">Grubu</label><br>
                        <div class="search_select_box bg-muted border text-dark grups" >
                          <select data-live-search="true" name="grubu" id="grupbir" required class="urunaddselects">
                          <option data-tokens="ketchup mustard"  class="text-center" value="">Seçiniz...</option>
                            @foreach($stokgrups as $stgrup)
                              <option data-tokens="ketchup mustard"  class="text-center"  value="{{$stgrup->id}}">{{$stgrup->grupadi}}</option>
                            @endforeach
                          </select>
                        </div>
                 </div>

                 <div class="col-md-6">
                        <label for="">Alt Grup</label><br>
                        <select data-live-search="true" name="altgrubu" class="urunaddselects grupsikis form-control" style="height: 36px; font-size: 11px;">
                            <option data-tokens="ketchup mustard"  class="text-center" value="">Seçim Yapınız..</option>
                        </select>
                 </div>
            </div>


            <div class="row my-3">
                 <div class="col-md-12">
                      <label for="">Marka</label><br>
                        <div class="search_select_box bg-muted border text-dark marks">
                          <select data-live-search="true" name="marka" id="markbir" required class="urunaddselects">
                          <option data-tokens="ketchup mustard"  class="text-center" value="">Seçiniz...</option>
                            @foreach($marka as $markas)
                              <option data-tokens="ketchup mustard"  class="text-center"  value="{{$markas->id}}">{{$markas->markaadi}}</option>
                            @endforeach
                          </select>
                       </div>
                 </div>
            </div>


            <div class="row my-3">
                <div class="col-md-6">
                    <label for="">Alış Fiyatı</label><br>
                    <input type="text" name="alisfiyati" required class="form-control inputsheight">
                </div>

                <div class="col-md-6">
                    <label for="">Perkande Satış</label><br>
                    <input type="text" name="perakendesatis" required class="form-control inputsheight">
                </div>
            </div>

            <div class="row my-3">
                <div class="col-md-6">
                    <label for="">Toptan Satış</label><br>
                    <input type="text" name="vadelisatis" required class="form-control inputsheight">
                </div>

                <div class="col-md-6">
                    <label for="">KDV Alış %</label><br>
                    <input type="text" name="kdvalis"  class="form-control inputsheight">
                </div>
            </div>

            
            <div class="row my-3">
                <div class="col-md-6">
                    <label for="">KDV Satış Tpt. %</label><br>
                    <input type="text" name="kdvsatistptn"  class="form-control inputsheight">
                </div>

                <div class="col-md-6">
                    <label for="">KDV Satış Prk. %</label><br>
                    <input type="text" name="kdvsatisprk"  class="form-control inputsheight">
                </div>
            </div>

            <div class="row my-3">
                <div class="col-md-6">
                    <label for="">Birimi</label><br>
                    <div class="search_select_box bg-muted border text-dark">
                        <select data-live-search="true" name="birimi" required>
                            <option data-tokens="ketchup mustard"  class="text-center" value="">Seçiniz...</option>
                          @foreach($stokbirim as $birims)
                            <option data-tokens="ketchup mustard"  class="text-center" value="{{$birims->id}}">{{$birims->birimadi}}</option>
                          @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="">Özel Kod</label><br>
                    <input type="text" name="ozelkodu" class="form-control" style="height: 36px;">
                    
                </div>
            </div>

            <div class="row my-3">
                <div class="col-md-6">
                        <label for="">İndirim %</label><br>
                        <input type="text" name="indirim" class="form-control inputsheight">
                </div>

                <div class="col-md-6">
                    <label for="">Açıklama</label><br>
                    <input type="text" name="aciklama" required class="form-control inputsheight">
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

<!-- STOK GÜNCELLE -->
<div class="modal fade font-sizerem" style="overflow-y:scroll;" id="stokguncelles" tabindex="-5" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="max-width:100%; height: auto;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-pen"></i> Stok Düzenle</h5>
          <div class="row">
          <a href="/admin/stok/grup" target="_blank" class="btn btn-sm btn-circle text-white mx-1 my-1" title="Gruplara Git" style="background-color: #00c4ff;"><i class="fas fa-layer-group"></i></a>
              <a href="/admin/stok/marka" target="_blank" class="btn btn-sm btn-circle text-white mx-1 my-1" title="Markalara Git" style="background-color: #25971e;"><i class="fa-regular fa-clone"></i></a>
              <a href="/admin/stok/birim" target="_blank" class="btn btn-sm btn-circle text-white mx-1 my-1"   title="Birimlere" style="background-color: #f73d45"><i class="fab fa-unity"></i></a>
          </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="{{route('admin.stok.sedit.post')}}" method="POST" enctype="multipart/form-data">
        @csrf
            <input type="hidden" id="ids" name="id">
           <div class="row">
             <div class="col-md-12">
                <h6 style="text-align:center; width:100%;" id="baslik">Baslik</h4>
             </div>
           </div>
            <div class="row">
                    <img src="{{asset('../images/yok.png')}}" id="resim" width="100%" height="300px"  alt="">
                    <label for="">Stok Resmi</label>
                    <input type="file" name="resim" class="form-control ">
            </div>

            <div class="row my-3">
                <div class="col-md-6">
                    <label for="">Stok Kodu</label><br>
                    <input type="text"  name="stokkodu" id="stokkodu" class="form-control inputsheight">
                </div>

                <div class="col-md-6">
                    <label for="">Barkodu</label><br>
                    <input type="text" name="barkodu" id="barkodu" class="form-control inputsheight">
                </div>
            </div>

            <div class="row my-3">
                <div class="col-md-12">
                    <label for="">Stok Adı</label><br>
                    <input type="text" name="stokadi" id="stokadi" class="form-control inputsheight">
                </div>
            </div>

            <div class="row my-3">
                 <div class="col-md-6">
                        <label for="">Grubu</label><br>
                        <div class="search_select_box bg-muted border text-dark grupsd grupu"  id="grubus">
                        <select data-live-search="true" id="grubu" name="grubu">
                          @foreach($stokgrups as $stgr)
                            <option data-tokens="ketchup mustard" value="{{$stgr->id}}" title="{{$stgr->grupadi}}">{{$stgr->grupadi}}</option>
                          @endforeach
                        </select>
                    </div>
                 </div>

                 <div class="col-md-6">
                          <label for="">Alt Grup</label><br>
                          <select data-live-search="true" id="grupsikisd" name="altgrubu" class="urunaddselects form-control" style="height: 36px; font-size: 11px;">
                              <option data-tokens="ketchup mustard"  class="text-center" value="0">Seçim Yapınız..</option>
                          </select>
                 </div>
            </div>

            <div class="row my-3">
                 <div class="col-md-12">
                        <label for="">Marka</label><br>
                        <div class="search_select_box bg-muted border text-dark markas" >
                          <select data-live-search="true" name="marka" required class="urunaddselects">
                            @foreach($marka as $markas)
                              <option data-tokens="ketchup mustard"  class="text-center" value="{{$markas->id}}">{{$markas->markaadi}}</option>
                            @endforeach
                          </select>
                        </div>
                 </div>
            </div>

          
            <div class="row my-3">
                <div class="col-md-6">
                    <label for="">Alış Fiyatı</label><br>
                    <input type="text" name="alisfiyati" id="alisfiyati" required class="form-control inputsheight">
                </div>

                <div class="col-md-6">
                    <label for="">Perkande Satış</label><br>
                    <input type="text" name="perakendesatis" id="perakendesatis" required class="form-control inputsheight">
                </div>
            </div>

            <div class="row my-3">
                <div class="col-md-6">
                    <label for="">Toptan Satış</label><br>
                    <input type="text" name="vadelisatis" id="vadelisatis" required class="form-control inputsheight">
                </div>

                <div class="col-md-6">
                    <label for="">KDV Alış %</label><br>
                    <input type="text" name="kdvalis" id="kdvalis"  class="form-control inputsheight">
                </div>
            </div>

            
            <div class="row my-3">
                <div class="col-md-6">
                    <label for="">KDV Satış Tpt. %</label><br>
                    <input type="text" name="kdvsatistptn" id="kdvsatistptn"  class="form-control inputsheight">
                </div>

                <div class="col-md-6">
                    <label for="">KDV Satış Prk. %</label><br>
                    <input type="text" name="kdvsatisprk" id="kdvsatisprk" class="form-control inputsheight">
                </div>
            </div>

            <div class="row my-3">
                <div class="col-md-6">
                    <label for="">Birimi</label><br>
                    <div class="search_select_box bg-muted border text-dark birimi" name="birimi">
                        <select data-live-search="true" id="birimi" name="birimi">
                          @foreach($stokbirim as $birims)
                            <option data-tokens="ketchup mustard" value="{{$birims->id}}" title="{{$birims->birimadi}}">{{$birims->birimadi}}</option>
                          @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="">Özel Kod</label><br>
                    <input type="text" name="ozelkodu" id="ozelkodu" class="form-control" style="height: 36px;">
                </div>
            </div>

            <div class="row my-3">
                <div class="col-md-6">
                        <label for="">İndirim %</label><br>
                        <input type="text" name="indirim" class="form-control inputsheight">
                </div>

                <div class="col-md-6">
                    <label for="">Açıklama</label><br>
                    <input type="text" name="aciklama" id="aciklama"  class="form-control inputsheight">
                </div>
            </div>
        </div>
      <div class="modal-footer">
       <button type="submit" class="btn btn-primary">Kaydet</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Vazgeç</button>
      </div>
     </form>
    </div>
  </div>
</div>
<!-- STOK GÜNCELLE -->



<!-- STOK HAREKET İŞLEMLERİ -->
<div class="modal fade font-sizerem" id="stokhareketislemleri"  style="overflow-y:scroll;" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="max-width:100%; height: auto;">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel"><i class="fas fa-cubes"></i> STOK HAREKET İŞLEMLERİ <br></h5>
        <div class="row">
             <a href="/admin/depo" target="_blank" class="btn btn-sm btn-circle text-white mx-1 my-1" title="Depo Ekle" style="background-color: #f73d45"><i class="list-icon feather feather-home"></i> </a>
             <a href="javascript:void(0)" onclick="hareketbutton()" target="_blank" class="btn btn-sm btn-circle text-white mx-1 my-1" title="Hareketlere Git" style="background-color: #39a0a5"><i class="fas fa-cubes"></i></a>
          </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="margin: 0px -18px;">
      
         <div class="row justify-content-center">
                <div class="col-md-4 mx-auto font-weight-bold" style="font-size: 15px;">
                <span id="dskod" class="text-center">STOKKOD</span><span id="dmktar" class="text-center"> (.. ADET) <span>
                </div>
         </div>
              <form action="{{route('admin.stok.stdepoins.post')}}" method="POST">
              @csrf
              <input type="hidden" name="urunid" id="depstid">
                  <div class="col-md-12 mt-2 mb-1">
                      <label for=""> Hareket Tipi</label>
                      <select name="hareket" id="alissatis" class="form-control text-center">
                          <option value="1">Giriş Hareketi</option>
                          <option value="0">Çıkış Hareketi</option>
                      </select>
                  </div>

                  <div class="col-md-12  mt-2 mb-1">
                      <label for=""> Miktar</label>
                      <input type="text" id="mktr" required name="miktar" class="form-control text-center">
                  </div>

                 <div class="col-md-12">
                    <label for="">Birimi</label><br>
                    <div class="search_select_box bg-muted border text-dark birimist" name="birimi">
                        <select data-live-search="true" id="birimis" name="birimid">
                          @foreach($stokbirim as $birims)
                            <option data-tokens="ketchup mustard" value="{{$birims->id}}" title="{{$birims->birimadi}}">{{$birims->birimadi}}</option>
                          @endforeach
                        </select>
                    </div>
                 </div>

                 <div class="col-md-12  mt-2 mb-1">
                      <label for=""> Fiyatı</label>
                      <input type="text" required name="fiyat" id="fiyats" class="form-control text-center depog">
                  </div>

                 <div class="col-md-12 my-2">
                    <label for="">Depo</label><br>
                    <div class="search_select_box bg-muted border text-dark" name="depoid">
                        <select data-live-search="true" id="depoid" name="depoid">
                          @foreach($stokdepo as $depo)
                            <option data-tokens="ketchup mustard" value="{{$depo->id}}" title="{{$depo->depoadi}}">{{$depo->depoadi}}</option>
                          @endforeach
                        </select>
                        
                    </div>
                </div>

                  <div class="col-md-12  mt-2 mb-1 my-3">
                      <label for=""> Açıklama</label>
                      <input type="text" name="aciklama" class="form-control text-center">
                  </div>
              

              <table class="col table table-bordered mr-5 my-3">
                <thead class="text-white" >
                <tr style="background-color: #68686861 !important; color:black;">
                  <th class="text-center">Depo Adı</th>
                  <th class="text-center">Giren</th>
                  <th class="text-center">Çıkan</th>
                  <th class="text-center">Kalan</th>
                </tr>
                @foreach($stokdepo as $depo)
                    <tr style="background-color:#686868  !important;">
                       <th class="text-center" id="thdepo" values="{{$depo->id}}">{{$depo->depoadi}}</th>
                       <th class="text-center depog" id="depogiren{{$depo->id}}" ids=""></th>
                       <th class="text-center depog" id="depocikan{{$depo->id}}"></th>
                       <th class="text-center depog" id="depokalan{{$depo->id}}"></th>
                 @endforeach
                 </tr>
                </thead>
                <tbody class="text-white" style="background-color: #686868 !important;">
                    <tr>
                     <td class="text-center">Toplam</td>
                     <th class="text-center depog" id="topgir">45</th>
                     <th class="text-center depog" id="topcik">30</th>
                     <th class="text-center depog" id="kalan">15</th>
                    </tr>
                </tbody>
              </table>
      </div>
      <div class="modal-footer">
       <button type="submit" class="btn btn-primary">Kaydet</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Vazgeç</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- END STOK HAREKET İŞLEMLERİ -->

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
       <form action="{{route('admin.stok.import')}}" method="POST" enctype="multipart/form-data">
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

 <script name="selectpicker">
     $('document').ready(function(){
        $('.search_select_box select').selectpicker();
     });
 </script>

<script names="fonksiyonlar">
   upt(id);
   delets(id);
</script>


<script name="upalerts">
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove(); 
        });
    }, 800);
</script>

<script name="getsdepo">
   function depupt(id){
         $('#alissatis option').removeAttr('selected').filter('[value=1]').attr('selected', true);
         $('#depstid').val("");
         $('#birimis').val("");
         $('#dskod').html("");
         $('#fiyats').val("");
         $('#mktr').val("");


       var asd=$('#birimts'+id).html();
       var topsayac=0;
       var topciksayac=0;
   
       $.get('/admin/stok/dpoedit/'+id, function(data){
         $('#depstid').val(data.id);
         $('#birimis').val(data.birimi);
         $('#dskod').html(data.stokkodu);
         $('#fiyats').val(data.alisfiyati);
         $('.birimist .filter-option-inner-inner').html(asd);
         $('#dmktar').html(' ( '+ $('#hrkets'+id).html() +' '+ asd +' )');
       });

       var depoid=$('#thdepo').attr('values');
       $('.depog').html("");
       
       $.get('/admin/stok/depomiktar/'+id, function(datas){
          $.each(datas,function(index,value){
            $('#depogiren'+value.depoid).html(value.miktar);
            topsayac=topsayac+value.miktar;
          });
          $('#topgir').html(topsayac);
       });

       $.get('/admin/stok/depomiktarcikan/'+id, function(datascik){
          $.each(datascik,function(index,value){
            $('#depocikan'+value.depoid).html(value.miktar);
            var kalan=$('#depogiren'+value.depoid).html()-$('#depocikan'+value.depoid).html();
            $('#depokalan'+value.depoid).html(kalan);
            topciksayac=topciksayac+value.miktar;
          });
          $('#topcik').html(topciksayac);
          var topcikkalan=$('#topgir').html()-$('#topcik').html();
       $('#kalan').html(topcikkalan);
       });
      
   }

</script>

<script name="altgrupselect">
 $(function(){
   $('.grups').change(function(){
      var myValue=$('.grups select').val();
      $.ajax({
        type:"POST",
        url:"{{route('admin.stok.grupaltgrup.post')}}",
        headers:{'X-CSRF-TOKEN':'{{csrf_token()}}'},
        data:{'kategoriid':myValue},
        datatype:"text",
        success:function(data){
          $('.grupsikis').html(data);
        }
      });
   });
 });
</script>

<script name="altgrupselectd">
 $(function(){
   $('.grupsd').change(function(){
      var myValue=$('.grupsd select').val();
      $.ajax({
        type:"POST",
        url:"{{route('admin.stok.grupaltgrup.post')}}",
        headers:{'X-CSRF-TOKEN':'{{csrf_token()}}'},
        data:{'kategoriid':myValue},
        datatype:"text",
        success:function(data){
          $('#grupsikisd').html(data);
        }
      });
   });
 });
</script>

<script name="altgrupselectds">
 $(function(){
   $('.grupara').change(function(){
      var myValue=$('.grupara').val();
      $.ajax({
        type:"POST",
        url:"{{route('admin.stok.grupaltgrup.post')}}",
        headers:{'X-CSRF-TOKEN':'{{csrf_token()}}'},
        data:{'kategoriid':myValue},
        datatype:"text",
        success:function(data){
          $('.gruparatikis').html(data);
        }
      });
   });
 });
</script>

<script name="alissatisselectd">
 $(function(){
   $('#alissatis').change(function(){
      var alsatValue=$('#alissatis').val();
      var ids=$('#depstid').val();
     
      $.get('/admin/stok/stokdepoalissatis/'+ids+'/'+alsatValue,function(alsats){
        if (alsatValue==0) {
          $('#fiyats').val(alsats.perakendesatis);
        }
        else if(alsatValue==1){
          $('#fiyats').val(alsats.alisfiyati);
        }
      });
   });
 });
</script>

<script name="linkyon">
  function hareketbutton(){
    var kods=$('#dskod').html();
    var pencere = window.open("/admin/depohareket/depohareketsearch?evrakno=&harekettipi=&stokkodu="+kods+"&depo=&bastarih=&bittarih=&hrktturu=",'_blank');
    pencere.focus()
  }
</script>



@endsection