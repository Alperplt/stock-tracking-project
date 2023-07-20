<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('admins/assets/css/style.css')}}" rel="stylesheet" type="text/css">
    <title>Katalog Yazdırma</title>
</head>
<body class="bg-white px-3" onload="window.print()" style="font-size:0.8rem; font-family:verdana !important;">
    <h6 class="float-right mx-2">{{date('d-m-Y')}}</h6>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6 col-md-2">
                <div class="col-md-12">
                    <img src="{{asset('/images/anasayfa/altnlgo.png')}}" alt="">
                </div>
            </div>
        </div>
    </div>

        <h5 class="text-center text-white p-2" style="background-color: #0c6e43 !important">CARİ - KATALOĞU</h5>
    <table class="table table-bordered my-4">
       <thead class="table-dark">
            <tr>
                <th class="text-center align-middle">Cari Adı</th>
                <th class="text-center align-middle">Grubu</th>
                <th class="text-center align-middle">Tc/Vergi No</th>
                <th class="text-center align-middle">Telefon</th>
                <th class="text-center align-middle">Bakiye</th>
                <th class="text-center align-middle">Alacak/Borç</th>               
            </tr>
       </thead>
       
       <tbody>
        @foreach($prints as $print)
          <tr class="text-center">
          <input type="hidden" value="{{$kdvharictutar=\App\Models\Stok::stokkdvhesap($print->id)}}">
             <td class="align-middle" >{{$print->cariadi}}</td>
             <td class="align-middle" >{{\App\Models\Carigrubu::grpnames($print->carigrubu)}}</td>
             <td class="align-middle" >@if($print->tcno!=null && $print->vergino==null) {{$print->tcno}} @elseif($print->tcno==null && $print->vergino!=null) {{$print->vergino}} @else Boş @endif </td>
             <td class="align-middle" >{{$print->telefon}}</td>
             <td class="align-middle" >{{number_format($print->satisfiyati-$kdvharictutar,2,',','.')}} ₺</td>
             <td class="align-middle" >Alacak</td>
          </tr>
        @endforeach
       </tbody>
    </table>
    <p class="text-center text-white p-3" style="background-color: #0c6e43 !important"></p>

</body>
</html>