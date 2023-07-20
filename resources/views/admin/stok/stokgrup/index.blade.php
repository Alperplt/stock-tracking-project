@extends('layouts.admin.homepage')
@section('title','Stok Grupları')
@section('header')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

@section('content')
<input type="hidden" value="{{$sayac=1}}">
<!--SEARCH-->
<div class="col-12">

    <div class="row justify-content-center border pt-3" style="font-size:0.3rem">
        <div class="col-md-4 text-center mx-2 mb-4">
            <label for="">Grup Adı</label>
            <div class="input-group">
                <input class="form-control inputsheight" id="gruptext" name="grupadi" placeholder="Yeni Grup Adını Yazınız..." required type="text">
                <span class="input-group-btn"><a class="btn btn-success btn-sm inputsheight" onclick="grupadd()" href="javascript: void(0);">
                <i class="fa-solid fa-plus"></i></a></span>
                <span class="input-group-btn mx-2"><a class="btn btn-sm inputsheight" id="refreshs" style="background-color:#543dd3; display:none;" href="/admin/stok/grup">
                <i class="fa-solid fa-arrows-rotate text-white"></i></a></span>
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
</div>
<!--END SEARCH-->

<!-- LİST -->
<div class="col-md-12 m-0 p-0 table-responsive">
    <table class="table table-striped table-muted table-bordered text-center my-4" style="font-size:0.7rem;">
        <div class="row">
        <div class="col-md-8">
            <div class="row justify-content-center">
               <form action="{{route('admin.stok.grupsearch')}}" type="get">
                    <div class="col-md-6">
                        <input type="search" name="grpnme" class="form-control" placeholder="Grup Ara..." style="padding:0px 15px; margin:7px 0px; height: 25px;">
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-sm btn-primary" title="Ara" style="padding:3px 7px; margin:8px 0px;"><i class="fas fa-search"></i></button>
                        <a href="/admin/stok/stokgrupsearch?grpnme=&sira=1" class="btn btn-sm btn-danger" title="Temizle" style="padding:3px 7px; margin:8px 0px;"><i class="fa-solid fa-magnifying-glass-minus"></i></a>
                    </div>
                
            </div>
        </div>
        <div class="col col-md-4 float-right my-2">
            <div class="row">
                <div class="col-md-10">
                    <select name="sira" id="" class="form-control text-center" style="padding:0px; height: 21px;">
                        <option value="1">Grup Adına Göre Sırala</option>
                        <option value="2">Grup Adına Göre Tersten Sırala</option>
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
                <th class="text-center" scope="col">Stok Grup Adı</th>
                <th class="text-center" scope="col">Ürün Sayısı</th>
                <th class="text-center" scope="col">İşlemler</th>

            </tr>
        </thead>
        <tbody id="gruplist">
        @foreach($liste as $list)
        <input type="hidden" id="ids" name="idst" value="{{$list->id}}">
            <tr id="sid{{$list->id}}">
                <td  class="align-middle">{{$sayac++}}</td>
                <td  class="align-middle">{{$list->grupadi}}</td>
                <td  class="align-middle">{{App\Models\Stok::stoksayisigrup($list->id)}}</td>
                <td  class="align-middle" style="width: 189px;">
                
                    <a href="javascript:void(0)"  class="btn btn-warning p-1" onclick="jupdate({{$list->id}})" title="Düzenle" data-toggle="modal" data-target="#depoekle" style="margin: 0px 7px;"><i class="fas fa-pen"></i></a>
                    <a href="javascript:void(0)"  class="btn  p-1 mx-2 text-white" onclick="altgrup({{$list->id}})" style="background-color:#0c7444;"  title="Alt Gruplara Git" data-toggle="modal" data-target="#altgrup"><i class="fa-solid fa-object-group"></i></a>
                    <a href="/admin/stok/stokssearch?stokkodu=&stokadi=&stokgrubu={{$list->id}}&stokaltgrubu=&marka=&barkodu=&ozelkodu=&birimi=&durum=&siralama=1" target="_blank"  class="btn btn-primary p-1 mx-2"  title="Stoklara Git"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                    <a href="javascript:void(0)"  class="btn btn-danger p-1" onclick="delt({{$list->id}})" title="Sil"><i class="fas fa-minus-circle"></i></a>
                </td>
            </tr>
        @endforeach
        
        </tbody>
        
    </table>
    <div class="row justify-content-center">
        <div class="col-md-3">{{ $liste->links() }}</div>
    </div>
</div>
<!--END LİST -->

<!-- GRUP DÜZENLE -->
<div class="modal fade font-sizerem" id="depoekle"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="max-width:100%; height: auto;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-layer-group"></i> GRUP DÜZENLE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="{{route('admin.stok.gredit.post')}}" method="POST">
       @csrf
          <input type="hidden" id="ids" name="id">
          <label for="">Grup Adı</label>
          <input id="grpname" name="grupadi" type="text" class="form-control">
       

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-warning" >Düzenle</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- END GRUP DÜZENLE -->

<!-- ALT GRUP -->
<div class="modal fade font-sizerem" id="altgrup"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="max-width:100%; height: auto;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-object-group"></i> ALT GRUP DÜZENLE</h5>
        <input type="hidden" id="altgrpid" value="">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="col-md-12 text-center mx-2 mb-4">
            <label for="">Alt Grup Adı</label>
            <div class="input-group">
                <input class="form-control inputsheight" id="altgruptext" name="altgrupadi" placeholder="Yeni Alt Grup Adını Yazınız..." required type="text">
                <span class="input-group-btn"><a class="btn btn-success btn-sm inputsheight" onclick="altgrupadd()" href="javascript: void(0);">
                <i class="fa-solid fa-plus"></i></a></span>
                <span class="input-group-btn mx-2"><a class="btn btn-sm inputsheight" id="refreshs" style="background-color:#543dd3; display:none;" href="/admin/stok/grup">
                <i class="fa-solid fa-arrows-rotate text-white"></i></a></span>
            </div>
        </div>
      </div>

      <table class="table" style="font-size:13px;"> 
        <thead>
            <tr class="text-center">
                <th class="text-center">Alt Grup Adı</th>
                <th class="text-center">İşlemler</th>
            </tr>
        </thead>

        <tbody id="altbody" >

           
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- END GRUP DÜZENLE -->

<!--ALT GRUP DÜZENLE -->
<div class="modal fade font-sizerem" id="altgrupdz"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="max-width:100%; height: auto;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-layer-group"></i>ALT GRUP DÜZENLE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="{{route('admin.stok.altgredit.post')}}" method="POST">
       @csrf
          <input type="hidden" id="altids" name="id">
          <label for="">Alt Grup Adı</label>
          <input id="altgrpname" name="altgrupadi" type="text" class="form-control">
       

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-warning" >Düzenle</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- END ALT GRUP DÜZENLE -->

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


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 
 
 <script name="grupekle">
 
  function grupadd(){
    var grupadis=$('#gruptext').val();
    if (grupadis!='') {

     $.ajax({
         data:{grupadi:grupadis},
         url:"{{route('admin.stok.grup.post')}}",
         headers:{'X-CSRF-TOKEN':'{{csrf_token()}}'},
         method:"POST",
         dataType:'json',
         success:function(data){
            alertss();
            $('#gruplist').append(
                '<tr><td  class="align-middle">{{$sayac++}}</td>'+
                '<td  class="align-middle">'+grupadis+'</td>'+
                '<td  class="align-middle">0</td>'+
                '<td  class="align-middle">'+
                    '<<a href="javascript:void(0)" class="btn btn-warning p-1" title="Düzenle" data-toggle="modal" data-target="#depoekle" style="margin: 0px 7px;"><i class="fas fa-pen"></i></a>'+
                    '<a href="javascript:void(0)"  class="btn btn-primary p-1 mx-2"  title="Stoklara Git"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>'+
                    '<a href="javascript:void(0)" class="btn btn-danger p-1"  title="Sil"><i class="fas fa-minus-circle"></i></a>'+
                '</td></tr>'
            );
            $('#gruplist').trigger("reset");   
            $('#gruptext').val('');
        },
        error:function(data){
            alertsserror();
        }
     });

     $('#refreshs').css('display','flex');
    }
            
  }

 </script>

 <script name="grupduzenle">
    function jupdate(id) {
        $.get('/admin/stok/stokgrupjvsr/'+id,function(data) {
          $('#ids').val(data.id);
          $('#grpname').val(data.grupadi);
        });
    }
     
 </script>

<script name="silme">
    function delt(id){
    if (confirm("Bu hareketi silmek istediğinizden eminmisiniz ?")){
        $.ajax({
            url:"/admin/stok/grupupdelete/"+id,
            type:'DELETE',
            data:{_token:$('input[name=_token]').val()},
            success:function(response){
                $('#sid'+id).remove();
                alertss();
            },
            error:function(response){
            alert("Silme İşlemi Başarısız !! Öncelikle Kategoriye ait ürünleri siliniz");
          }
        });
      }
    }

</script>

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

<script name="altgrup">
    function altgrup(id){
        $.get('/admin/stok/altgrupgetir/'+id,function(altdata) {
            $('#altgrpid').val(id);
            $('#altbody').html("");
            $.each(altdata,function(index,altdata){
                $('#altbody').append(
                    '<tr id="altsid'+altdata.id+'">'+
                        '<td class="text-center">'+altdata.altgrupadi+'</td>'+
                        '<td class="text-center">'+
                            '<a href="javascript:void(0)" onclick="altgrupd('+altdata.id+')"  class="btn btn-warning p-1" onclick="jupdate({{$list->id}})" title="Düzenle" data-toggle="modal" data-target="#altgrupdz" style="margin: 0px 7px;"><i class="fas fa-pen"></i></a>'+
                            '<a href="/admin/stok/stokssearch?stokkodu=&stokadi=&stokgrubu='+id+'&stokaltgrubu='+altdata.id+'&marka=&barkodu=&ozelkodu=&birimi=&durum=&siralama=1" target="_blank"  class="btn btn-primary p-1 mx-2"  title="Stoklara Git"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>'+
                            '<a href="javascript:void(0)" onclick="altdelt('+altdata.id+')" class="btn btn-danger p-1" onclick="delt({{$list->id}})" title="Sil"><i class="fas fa-minus-circle"></i></a>'+
                        '</td>'+
                    '</tr>'
                );

            });
        });
    }

</script>

<script name="altgrupekle">
 
  function altgrupadd(){
    var altgrupadis=$('#altgruptext').val();
    var katid=$('#altgrpid').val();
    if (altgrupadis!='') {

     $.ajax({
         data:{altgrupadi:altgrupadis, kategoriid:katid},
         url:"{{route('admin.stok.altgrup.post')}}",
         headers:{'X-CSRF-TOKEN':'{{csrf_token()}}'},
         method:"POST",
         dataType:'json',
         success:function(data){
            alertss();
            $('#altbody').append(
                    '<tr>'+
                        '<td class="text-center">'+altgrupadis+'</td>'+
                        '<td class="text-center">'+
                            '<a href="javascript:void(0)"  class="btn btn-warning p-1" onclick="jupdate({{$list->id}})" title="Düzenle" data-toggle="modal" data-target="#depoekle" style="margin: 0px 7px;"><i class="fas fa-pen"></i></a>'+
                            '<a href="javascript:void(0)"  class="btn btn-primary p-1 mx-2"  title="Stoklara Git"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>'+
                            '<a href="javascript:void(0)"  class="btn btn-danger p-1" onclick="delt({{$list->id}})" title="Sil"><i class="fas fa-minus-circle"></i></a>'+
                        '</td>'+
                    '</tr>'
                );
            $('#altbody').trigger("reset");   
            $('#altgruptext').val('');
        },
        error:function(data){
            alertsserror();
        }
     });

     $('#refreshs').css('display','flex');
    }
            
  }

</script>

<script name="altgrupduzenle">
    function altgrupd(id){
        
        $.get('/admin/stok/altgrupduzgetir/'+id,function(altdzdata) {
            $('#altgrpname').html("");
           $('#altids').val(altdzdata.id);
           $('#altgrpname').val(altdzdata.altgrupadi);
        });
    }

</script>

<script name="altsilme">
    function altdelt(id){
    if (confirm("Bu hareketi silmek istediğinizden eminmisiniz ?")){
        $.ajax({
            url:"/admin/stok/altsdelete/"+id,
            type:'DELETE',
            data:{_token:$('input[name=_token]').val()},
            success:function(response){
                $('#altsid'+id).remove();
                alertss();
            },
            error:function(response){
            alert("Silme İşlemi Başarısız !! Öncelikle Kategoriye ait ürünleri siliniz");
          }
        });
      }
    }

</script>

@endsection