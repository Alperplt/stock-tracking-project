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

        <h5 class="text-center text-white p-2" style="background-color: #0c6e43 !important">ÜRÜN - KATALOĞU</h5>
    <table class="table table-bordered my-4">
       <thead class="table-dark">
            <tr>
                <th class="text-center align-middle">#</th>
                <th class="text-center align-middle">Stok Adı</th>
                <th class="text-center align-middle">Grubu</th>
                <th class="text-center align-middle">Kdv(%)</th>
                <th class="text-center align-middle">Kdv Hariç Fiyat</th>
                <th class="text-center align-middle">Kdv Tutar</th>
                <th class="text-center align-middle">Kdv Dahil Fiyat</th>
               
            </tr>
       </thead>
       
       <tbody>
        @foreach($prints as $print)
          <tr class="text-center">
          <input type="hidden" value="{{$kdvharictutar=\App\Models\Stok::stokkdvhesap($print->id)}}">
             <td class="align-middle" ><img src="@if($print->resim!=null) {{$print->resim}} @else {{asset('/images/anasayfa/altnlgo.png')}} @endif " width="40px" alt=""></td>
             <td class="align-middle" >{{$print->stokadi}}</td>
             <td class="align-middle" >{{\App\Models\Stokgrup::grpnames($print->grubu)}}</td>
             <td class="align-middle" >{{$print->kdvsatisprk}}</td>
             <td class="align-middle" >{{number_format($print->perakendesatis-$kdvharictutar,2,',','.')}} ₺</td>
             <td class="align-middle" >{{number_format($kdvharictutar,2,',','.')}} ₺</td>
             <td class="align-middle" >{{number_format($print->perakendesatis,2,',','.')}} ₺</td>
          </tr>
        @endforeach
       </tbody>
    </table>
    <p class="text-center text-white p-3" style="background-color: #0c6e43 !important"></p>

</body>
</html>