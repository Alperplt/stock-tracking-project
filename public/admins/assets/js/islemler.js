
//STOK GÜNCELLEME İŞLEMLERİ

function upt(id){
    guncelreset();
       $.get('/admin/stok/sedit/'+id, function(data){
         $('#ids').val(data.id);
         if(data.resim!=null){
            $('#resim').attr('src',data.resim);
         }
         else if(data.resim==null){
            $('#resim').attr('src','../images/yok.png');
         }
         $('#stokkodu').val(data.stokkodu);
         $('#baslik').html(data.stokadi+' ( '+ data.stokkodu +' )');
         $('#barkodu').val(data.barkodu);
         $('#stokadi').val(data.stokadi);
         $('#grubu').val(data.grubu);
         $('.grupu .filter-option-inner-inner').html($('#grpts'+id).html());
         $('#grupsikisd').val(data.altgrubu);
         $('#marka').val(data.marka);
         $('.markas .filter-option-inner-inner').html($('#marka'+id).html());
         $('#alisfiyati').val(data.alisfiyati);
         $('#perakendesatis').val(data.perakendesatis);
         $('#vadelisatis').val(data.vadelisatis);
         $('#kdvalis').val(data.kdvalis);
         $('#kdvsatistptn').val(data.kdvsatistptn);
         $('#kdvsatisprk').val(data.kdvsatisprk);
         $('#indirim').val(data.indirim);
         $('#birimi').val(data.birimi);
         $('.birimist .filter-option-inner-inner').html($('#birimts'+id).html());
         $('#ozelkodu').val(data.ozelkodu);
         $('#aciklama').val(data.aciklama);

         

         $.get('/admin/stok/grupaltgrupselectget/'+data.grubu, function(sdata){
            $('#grupsikisd').html("");
            $('#grupsikisd').append('<option value="0">Seçim Yapınız..</option>');
            $.each(sdata,function(index,sdata){
                    $('#grupsikisd').append('<option value="'+sdata.id+'">'+sdata.altgrupadi+'</option>');
                    if (data.altgrubu==sdata.id) {
                        $('#grupsikisd option').attr('selected',true);
                    }
            });
            
         });
       });
      
     
   }

   function guncelreset(){

    $('#ids').val("");
    $('#resim').attr('src','../images/yok.png');
    $('#stokkodu').val("");
    $('#baslik').html("");
    $('#barkodu').val("");
    $('#stokadi').val("");
    $('#grubu').val("");
    $('.grupu .filter-option-inner-inner').html("");
    $('#marka').val("");
    $('.markas .filter-option-inner-inner').html("");
    $('#alisfiyati').val("");
    $('#satisfiyati').val("");
    $('#kdv').val("");
    $('#indirim').val("");
    $('#birimi').val("");
    $('.birimist .filter-option-inner-inner').html("");
    $('#ozelkodu').val("");
}


//STOK SWİTCH AKTİF-PASİF



// ALERT - İşlem sonucu

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

//DELETE İŞLEMİ

function delets(id){
    var stk=$('#stkod'+id).html();
    if (confirm(stk+"  kodlu stoğu silmek istediğinizden emin misiniz ?")) {
        $.ajax({
            url:"/admin/stok/sdelete/"+id,
            type:'DELETE',
            data:{_token:$('input[name=_token]').val()},
            success:function(response){
              $('#sid'+id).remove();
              alertss();
            },
              error:function(response){
              alert("Silme İşlemi Başarısız !! Öncelikle stoğa ait hareketleri siliniz !!");
            }
        });
    }
}