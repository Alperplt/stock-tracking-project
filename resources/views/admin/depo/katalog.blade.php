<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('admins/assets/css/style.css')}}" rel="stylesheet" type="text/css">
    <title>Depo Yazdırma</title>
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

        <h5 class="text-center text-white p-2" style="background-color: #0c6e43 !important">DEPO LİSTESİ</h5>
    <table class="table table-bordered my-4">
       <thead class="table-dark">
            <tr>
                <th class="text-center align-middle">Depo Adı</th>
                <th class="text-center align-middle">Kalem Sayısı</th>
                <th class="text-center align-middle">Stok Sayısı</th>               
            </tr>
       </thead>
       
       <tbody>
        @foreach($prints as $print)
          <tr class="text-center">
             <td class="align-middle" >{{$print->depoadi}}</td>
             <td class="align-middle" >0</td>
             <td class="align-middle" >0</td>
          </tr>
        @endforeach
       </tbody>
       <tfoot>
            <tr>
                <td class="border text-center">Toplam</td>
                <td class="border text-center">0</td>
                <td class="border text-center">0</td>
            </tr>
       </tfoot>
    </table>
    <p class="text-center text-white p-3" style="background-color: #0c6e43 !important"></p>

</body>
</html>