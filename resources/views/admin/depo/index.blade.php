@extends('layouts.admin.homepage')
@section('title','Depolar')
@section('header')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

@section('content')
<input type="hidden" value="{{$sayac=1}}">


<!--SEARCH-->
<div class="col-12">
    <div class="row justify-content-center border pt-3" style="font-size:0.3rem">
        <div class="col-md-4 text-center mx-2 mb-4">
            <label for="">Depo Adı</label>
            <div class="input-group">
                <input class="form-control inputsheight" id="depotext" placeholder="Yeni Depo Adını Yazınız..." type="text"> <span class="input-group-btn"><a class="btn btn-success btn-sm inputsheight" onclick="depoadd()" href="javascript: void(0);"><i class="fa-solid fa-plus"></i></a></span>
            </div>
        </div>

    </div>
</div>

<div class="col-md-12 text-center">
            @if(session('status')=="Güncelleme İşlemi Başarılı")
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
<!--END SEARCH-->

<!-- LİST -->
<div class="col-md-12 m-0 p-0 table-responsive">
    <table class="table table-striped table-muted table-bordered text-center my-4" style="font-size:0.7rem;">
    <div class="row">
            <div class="col-md-8">
                <div class="row justify-content-center">
                <form action="{{route('admin.depo.deposearch')}}" type="get">
                        <div class="col-md-6">
                            <input type="search" name="dpnme" class="form-control" placeholder="Depo Ara..." style="padding:0px 15px; margin:7px 0px; height: 25px;">
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-sm btn-primary" title="Ara" style="padding:3px 7px; margin:8px 0px;"><i class="fas fa-search"></i></button>
                            <a href="/admin/depo/deposearch?dpmnme=&sira=1" class="btn btn-sm btn-danger" title="Temizle" style="padding:3px 7px; margin:8px 0px;"><i class="fa-solid fa-magnifying-glass-minus"></i></a>
                        </div>
                    
                </div>
            </div>
            <div class="col col-md-4 float-right my-2">
                <div class="row">
                    <div class="col-md-10">
                        <select name="sira" id="" class="form-control text-center" style="padding:0px; height: 21px;">
                            <option value="1">Depo Adına Göre Sırala</option>
                            <option value="2">Depo Adına Göre Tersten Sırala</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-sm btn-dark" title="Sırala"><i class="fas fa-sort"></i></button>
                    </div>
                </div>
                </form>
            </div> 
        </div>
        <thead >
            <tr >
                <th class="text-center" scope="col">#</th>
                <th class="text-center" scope="col">Depo Adı</th>
                <th class="text-center" scope="col">Depodaki Kalem Sayısı</th>
                <th class="text-center" scope="col">Depodaki Toplam Stok Sayısı</th>
                <th class="text-center" scope="col">İşlemler</th>

            </tr>
        </thead>
        <tbody id="depolist">
        @foreach($liste as $list)
         <input type="hidden" value="{{@$a+=(App\Models\Depohareket::depotoplamkalem($list->id)->count())}}">
         <input type="hidden" value="{{@$toplamsayi=App\Models\Depohareket::toplamsayi($list->id)}}">

            <tr id="sid{{$list->id}}">
                <td  class="align-middle">{{$sayac++}}</td>
                <td  class="align-middle">{{$list->depoadi}}</td>
                <td  class="align-middle">{{(App\Models\Depohareket::depotoplamkalem($list->id)->count())}}</td>
                <td  class="align-middle">{{App\Models\Depohareket::depotoplamlar($list->id)}}</td>
                <td  class="align-middle">
                    <a href="javascript:void(0)" onclick="jupdate({{$list->id}})" class="btn btn-warning p-1" title="Düzenle" data-toggle="modal" data-target="#depoup"><i class="fas fa-pen"></i></a>
                    <a href="/admin/depohareket/depohareketsearch?evrakno=&harekettipi=&stokkodu=&depo={{$list->id}}&bastarih=&bittarih=&hrktturu=" target="_blank" class="btn p-1 text-white" title="Depoya Git" style="background-color:#41c0dd;"><i class="fa-solid fa-warehouse"></i></a>
                    <a href="javascript:void(0)" onclick="delt({{$list->id}})" data-id="{{$list->stokkodu}}" class="btn btn-danger p-1" title="Sil"><i class="fas fa-minus-circle"></i></button>                
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfooter>
            <tr style="background-color: #eef1f2;">
                <td colspan="2">Toplamlar</td>
                <td>{{@$a}}</td>
                <td>{{@$toplamsayi}}</td>
                <td></td>
            </tr>
        </tfooter>
    </table>
</div>
<!--END LİST -->


<!-- DEPO DÜZENLE -->
<div class="modal fade font-sizerem" id="depoup"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="max-width:100%; height: auto;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-warehouse"></i> DEPO DÜZENLE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="{{route('admin.depo.dpedit.post')}}" method="POST">
       @csrf
       <input type="hidden" id="ids" name="id">
          <label for="">Depo Adı</label>
          <input id="dpname" name="depoadi" type="text" class="form-control">
       

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-warning">Düzenle</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- END DEPO DÜZENLE -->

@endsection
@section('footer')
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>
 <script>
     $('document').ready(function(){
        $('.search_select_box select').selectpicker();
     });
 </script>

<script name="depoekle">
 
 function depoadd(){
   var depoadis=$('#depotext').val();
   if (depoadis!='') {

    $.ajax({
        data:{depoadi:depoadis},
        url:"{{route('admin.depo.depo.post')}}",
        headers:{'X-CSRF-TOKEN':'{{csrf_token()}}'},
        method:"POST",
        dataType:'json',
        success:function(data){
           alertss();
           $('#depolist').append(
               '<tr><td  class="align-middle">{{$sayac++}}</td>'+
               '<td  class="align-middle">'+depoadis+'</td>'+
               '<td  class="align-middle">0</td>'+
               '<td  class="align-middle">0</td>'+
               '<td class="align-middle">'+
                   '<button class="btn btn-warning p-1" title="Düzenle" data-toggle="modal" data-target="#depoekle"><i class="fas fa-pen"></i></button>'+
                   '<a href="#" class="btn p-1 text-white" title="Depoya Git" style="background-color:#41c0dd; margin: 0px 2px;"><i class="fa-solid fa-warehouse"></i></a>'+
                   '<button class="btn btn-danger p-1" title="Sil"><i class="fas fa-minus-circle"></i></button>'+
               '</td></tr>');
           $('#depolist').trigger("reset");   
           $('#depotext').val('');
       },
       error:function(data){
        alertsserror();
       }
    });

    $('#refreshs').css('display','flex');
   }
           
 }

</script>

<script name="depouzenle">
    function jupdate(id) {
        $.get('/admin/depo/depojvsr/'+id,function(data) {
          $('#ids').val(data.id);
          $('#dpname').val(data.depoadi);
        });
    }
     
</script>


<script name="silme">
    function delt(id){
    if (confirm("Bu hareketi silmek istediğinizden eminmisiniz ?")){
        $.ajax({
            url:"/admin/depo/depodelete/"+id,
            type:'DELETE',
            data:{_token:$('input[name=_token]').val()},
            success:function(response){
                $('#sid'+id).remove();
                alertss();
            },
            error:function(response){
            alert("Silme İşlemi Başarısız !! Öncelikle Markaya ait ürünleri siliniz");
          }
        });
      }
    }

</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 <script name="alerts">
   function alertss(){
    const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 1500,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
    })

    Toast.fire({
    icon: 'success',
    title: 'İşlem Başarılı'
    })  
   }



   function alertsserror(){
    const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 1500,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
    })

    Toast.fire({
    icon: 'error',
    title: 'Bu veri daha önceden kayıt edilmiş !!'
    })  
   }
   
 
 </script>

<script name="upalerts">
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove(); 
        });
    }, 800);
</script>
@endsection