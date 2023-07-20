@extends('layouts.admin.homepage')
@section('title','Sipariş Kayıt')
@section('header')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/0.7.0/css/perfect-scrollbar.min.css" rel="stylesheet" type="text/css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css" rel="stylesheet" type="text/css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-touchspin/3.1.2/jquery.bootstrap-touchspin.min.css" rel="stylesheet" type="text/css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.1.7/css/ion.rangeSlider.min.css" rel="stylesheet" type="text/css">
@section('content')
  <div class="widget-body clearfix">
     <div class="ecommerce-invoice">
                    <div class="input-group">
                        <input class="form-control inputsheight" id="l8" placeholder="Cari Ara..." type="text"> <span class="input-group-btn"><a class="btn btn-success btn-sm inputsheight" href="javascript: void(0);"><i class="fa-solid fa-magnifying-glass-plus"></i></a></span>
                    </div>
      <!-- /.row -->
         <hr>
         <div class="">
            <div class="row border p-3 font-sizerem">
                <div class="col-md-2">
                    <span class="font-weight-bold">Cari Kodu :</span> <span>CR0001</span>
                </div>

                <div class="col-md-2">
                    <span class="font-weight-bold">Ticari Ünvan :</span> <span>Polat A.Ş</span>
                </div>

                <div class="col-md-2">
                    <span class="font-weight-bold">Yetkili :</span> <span>Alper Polat</span>
                </div>

                <div class="col-md-2">
                    <span class="font-weight-bold">Telefon :</span> <span>05076105228</span>
                </div>

                <div class="col-md-4">
                    <span class="font-weight-bold">Adres :</span> <span>Uğur Mumcu cad. Çelik Apt. kat:2 No:6</span>
                </div>
            </div>

            <div class="row border p-3 font-sizerem my-2  justify-content-center">
                <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-4 my-2 text-right">
                                <span class="font-weight-bold text-center">Sipariş No :</span> 
                        </div>
                        <div class="col-md-8 mx-0 p-0">
                                <input type="text" value="SR0001" class="form-control inputstable2 text-center">
                        </div>
                    </div>
                 </div>

                 <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-4 my-2 text-right">
                             <span class="font-weight-bold text-center">Hareket :</span> 
                        </div>

                        <div class="col-md-8 mx-0 p-0">
                             <select name="" id="" class="form-control inputstable2 text-center">
                                 <option value="1">Satış</option>
                                 <option value="0">Alış</option>
                             </select>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-4 my-2 text-right">
                             <span class="font-weight-bold text-center">Tarih :</span> 
                        </div>

                        <div class="col-md-8 mx-0 p-0">
                            <input type="date" value="<?php echo date('Y-m-d') ?>" class="form-control inputstable2">
                        </div>
                    </div>
                </div>

                <div class="col-md-2 ">
                    <div class="row">
                        <div class="col-md-4 my-2 text-right">
                             <span class="font-weight-bold text-center">İndirim :</span> 
                        </div>

                        <div class="col-md-8">
                            <div class="input-group">
                                <input class="form-control inputstable2" id="l8" placeholder="İndirim oranı gir..." type="text"> <span class="input-group-btn"><a class="btn btn-success btn-sm inputsheight" href="javascript: void(0);"><i class="fa-solid fa-magnifying-glass-plus"></i></a></span>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
         </div>
         <!-- /.row -->
         <hr class="border-0">
         <table class="table table-bordered table-striped table-responsive font-sizerem">
             <thead>
                 <tr class="bg-color-scheme-dark text-white">
                     <th class="text-center">#</th>
                     <th class="text-center align-middle">Stok Kodu</th>
                     <th class="text-center align-middle">Stok Adı</th>
                     <th class="text-center align-middle">Miktar</th>
                     <th class="text-center align-middle">Birim</th>
                     <th class="text-center align-middle">Depo</th>
                     <th class="text-center align-middle">Kdv(%)</th>
                     <th class="text-center align-middle">Birim Fiyat</th>
                     <th class="text-center align-middle">Kdv(Birim)</th>
                     <th class="text-center align-middle">Ara Toplam</th>
                     <th class="text-center align-middle">Kdv Toplam</th>
                     <th class="text-center align-middle">Genel Toplam</th>
                     <th class="text-center align-middle">İşlemler</th>
                 </tr>
             </thead>
             <tbody>
                 <tr>
                     <td class="text-center align-middle">1</td>
                     <td class="text-center align-middle">ST0001</td>
                     <td class="text-center align-middle">
                        <div class="search_select_box bg-muted border text-dark">
                            <select data-live-search="true" class="form-control" style="height: 34px;">
                                <option data-tokens="ketchup mustard" class="sfont-sizerem">Suplas Sulama Borusu 100cm/5m</option>
                                <option data-tokens="mustard" class="sfont-sizerem">Suplas Sulama Borusu 100cm/10m</option>
                                <option data-tokens="frosting" class="sfont-sizerem">Suplas Sulama Borusu 100cm/15m</option>
                            </select>
                        </div>
                     </td>
                     <td class="text-center align-middle ">
                        <div class="input-group bootstrap-touchspin selectheight">
                            <input type="text" id="verticalTouchspin" style="margin: 0px 10px; height:33px; text-align: tex-center !important;" value="1" data-toggle="touchspin" data-plugin-options="{&quot;verticalbuttons&quot;: true }" class="form-control text-center" style="display: block;"><span class="input-group-addon bootstrap-touchspin-postfix" style="display: none;"></span>
                        </div>
                    </td>
                     <td class="text-center align-middle ">
                         <select name="" id="" class="form-control text-center font-sizerem selectheight align-middle tselectwidth">
                             <option value="">ADET</option>
                         </select>
                     </td>
                     <td class="text-center align-middle">
                         <select name="" id="" class="form-control text-center font-sizerem selectheight align-middle">
                             <option value="">MERKEZ</option>
                         </select>
                     </td>
                     <td class="text-center align-middle">18</td>
                     <td class="text-center align-middle"><input type="text" class="form-control font-sizerem text-center tinputswidth"></td>
                     <td class="text-center align-middle">18</td>
                     <td class="text-center align-middle">100</td>
                     <td class="text-center align-middle">36</td>
                     <td class="text-center align-middle">136.000.000</td>
                     <td class="text-center align-middle">
                         <button class="btn btn-sm btn-danger"> <i class="fa-solid fa-circle-minus"></i></button>
                     </td>
                 </tr>

                 <tr>
                     <td class="text-center align-middle">1</td>
                     <td class="text-center align-middle">ST0001</td>
                     <td class="text-center align-middle">
                        <div class="search_select_box bg-muted border text-dark">
                            <select data-live-search="true" class="form-control" style="height: 34px;">
                                <option data-tokens="ketchup mustard" class="sfont-sizerem">Suplas Sulama Borusu 100cm/5m</option>
                                <option data-tokens="mustard" class="sfont-sizerem">Suplas Sulama Borusu 100cm/10m</option>
                                <option data-tokens="frosting" class="sfont-sizerem">Suplas Sulama Borusu 100cm/15m</option>
                            </select>
                        </div>
                     </td>
                     <td class="text-center align-middle ">
                        <div class="input-group bootstrap-touchspin selectheight">
                            <input type="text" id="verticalTouchspin" style="margin: 0px 10px; height:33px; text-align: tex-center !important;" value="1" data-toggle="touchspin" data-plugin-options="{&quot;verticalbuttons&quot;: true }" class="form-control text-center" style="display: block;"><span class="input-group-addon bootstrap-touchspin-postfix" style="display: none;"></span>
                        </div>
                    </td>
                     <td class="text-center align-middle ">
                         <select name="" id="" class="form-control text-center font-sizerem selectheight align-middle tselectwidth">
                             <option value="">ADET</option>
                         </select>
                     </td>
                     <td class="text-center align-middle">
                         <select name="" id="" class="form-control text-center font-sizerem selectheight align-middle">
                             <option value="">MERKEZ</option>
                         </select>
                     </td>
                     <td class="text-center align-middle">18</td>
                     <td class="text-center align-middle"><input type="text" class="form-control font-sizerem text-center tinputswidth"></td>
                     <td class="text-center align-middle">18</td>
                     <td class="text-center align-middle">100</td>
                     <td class="text-center align-middle">36</td>
                     <td class="text-center align-middle">136.000.000</td>
                     <td class="text-center align-middle">
                         <button class="btn btn-sm btn-danger"> <i class="fa-solid fa-circle-minus"></i></button>
                     </td>
                 </tr>

                 <tr>
                     <td class="text-center align-middle">1</td>
                     <td class="text-center align-middle">ST0001</td>
                     <td class="text-center align-middle">
                        <div class="search_select_box bg-muted border text-dark">
                            <select data-live-search="true" class="form-control" style="height: 34px;">
                                <option data-tokens="ketchup mustard" class="sfont-sizerem">Suplas Sulama Borusu 100cm/5m</option>
                                <option data-tokens="mustard" class="sfont-sizerem">Suplas Sulama Borusu 100cm/10m</option>
                                <option data-tokens="frosting" class="sfont-sizerem">Suplas Sulama Borusu 100cm/15m</option>
                            </select>
                        </div>
                     </td>
                     <td class="text-center align-middle ">
                        <div class="input-group bootstrap-touchspin selectheight">
                            <input type="text" id="verticalTouchspin" style="margin: 0px 10px; height:33px; text-align: tex-center !important;" value="1" data-toggle="touchspin" data-plugin-options="{&quot;verticalbuttons&quot;: true }" class="form-control text-center" style="display: block;"><span class="input-group-addon bootstrap-touchspin-postfix" style="display: none;"></span>
                        </div>
                    </td>
                     <td class="text-center align-middle ">
                         <select name="" id="" class="form-control text-center font-sizerem selectheight align-middle tselectwidth">
                             <option value="">ADET</option>
                         </select>
                     </td>
                     <td class="text-center align-middle">
                         <select name="" id="" class="form-control text-center font-sizerem selectheight align-middle">
                             <option value="">MERKEZ</option>
                         </select>
                     </td>
                     <td class="text-center align-middle">18</td>
                     <td class="text-center align-middle"><input type="text" class="form-control font-sizerem text-center tinputswidth"></td>
                     <td class="text-center align-middle">18</td>
                     <td class="text-center align-middle">100</td>
                     <td class="text-center align-middle">36</td>
                     <td class="text-center align-middle">136.000.000</td>
                     <td class="text-center align-middle">
                         <button class="btn btn-sm btn-danger"> <i class="fa-solid fa-circle-minus"></i></button>
                     </td>
                 </tr>

             </tbody>
         </table>
         <div class="row justify-content-center">
            <div class="col-md-1 col">
                <a href="javascript:void(0)" class="add-btn btn btn-circle btn-md fs-20 btn-color-scheme form-control"><i class="feather feather-plus"></i></a>
            </div>
         </div>
         
         <div class="row font-sizerem">
             <div class="col-md-8">
                 <!--LEFT TABLE -->
             </div>
             <div class="col-md-4 invoice-sum list-unstyled" style="font-size: 14px;">
                 <ul class="list-unstyled">
                     <li>
                        <strong> Ara Toplam :</strong> 
                        <span class="float-right">1500 ₺</span> 
                     </li>
                     <li>
                        <strong> Kdv Toplam :</strong> 
                        <span class="float-right">300 ₺</span> 
                     </li>
                     <li>
                        <strong>Genel Toplam:</strong>
                        <strong class="float-right">1800 ₺</strong> 
                     </li>
                 </ul>
             </div>
         </div>
         <!-- /.row -->
         <button class="btn btn-primary form-control" style="padding: 7px 529px;" ><i class="fa-solid fa-floppy-disk mx-2"></i>  Kaydet</button>
      </div>
    <!-- /.ecommerce-invoice -->
 </div>

@endsection
@section('footer')
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-touchspin/3.1.2/jquery.bootstrap-touchspin.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>
 <script>
     $('document').ready(function(){
        $('.search_select_box select').selectpicker();
     });
 </script>
@endsection