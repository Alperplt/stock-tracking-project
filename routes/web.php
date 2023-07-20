<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['namespace'=>'admin','prefix'=>'admin','as'=>'admin.'],function(){
    Route::get('/',[App\Http\Controllers\admin\indexController::class, 'index']);
    
    Route::group(['namespace'=>'stok','prefix'=>'stok','as'=>'stok.'],function(){
        Route::get('/',[App\Http\Controllers\admin\stok\indexController::class, 'index'])->name('index');
        Route::post('/save',[App\Http\Controllers\admin\stok\indexController::class, 'store'])->name('create.post');
        Route::get('/switch',[App\Http\Controllers\admin\stok\indexController::class, 'switch'])->name('switch');
        Route::get('/stokssearch',[App\Http\Controllers\admin\stok\indexController::class, 'search'])->name('stoksearch');
        Route::get('/sedit/{id}',[App\Http\Controllers\admin\stok\indexController::class, 'sedit'])->name('sedit');
        Route::get('/dpoedit/{id}',[App\Http\Controllers\admin\stok\indexController::class, 'dedit'])->name('sedit');
        Route::get('/depomiktar/{id}',[App\Http\Controllers\admin\stok\indexController::class, 'depomiktars']);
        Route::get('/depomiktarcikan/{id}',[App\Http\Controllers\admin\stok\indexController::class, 'depomiktarcikans']);
        Route::post('/seditupdt',[App\Http\Controllers\admin\stok\indexController::class, 'update'])->name('sedit.post');
        Route::get('/katalogprint',[App\Http\Controllers\admin\stok\indexController::class, 'katalogprint'])->name('katalogprint');
        Route::post('/stdepoinst',[App\Http\Controllers\admin\stok\indexController::class, 'stdepoins'])->name('stdepoins.post');
        Route::delete('/sdelete/{id}',[App\Http\Controllers\admin\stok\indexController::class, 'delete']);
        Route::get('/stokdepoalissatis/{ids}/{alsatValue}',[App\Http\Controllers\admin\stok\indexController::class, 'respnsealsat']);
        Route::get('/export', [App\Http\Controllers\admin\stok\indexController::class, 'exportStok'])->name('export');
        Route::post('/import', [App\Http\Controllers\admin\stok\indexController::class, 'importStok'])->name('import');


        Route::get('/grup',[App\Http\Controllers\admin\stok\stokgrup\indexController::class, 'index'])->name('gindex');
        Route::get('/grupgetir/{id}',[App\Http\Controllers\admin\stok\stokgrup\indexController::class, 'index'])->name('edit');
        Route::post('/grupupdate',[App\Http\Controllers\admin\stok\stokgrup\indexController::class, 'update'])->name('gredit.post');
        Route::post('/grupinsert',[App\Http\Controllers\admin\stok\stokgrup\indexController::class, 'sgruppost'])->name('grup.post');
        Route::delete('/grupupdelete/{id}',[App\Http\Controllers\admin\stok\stokgrup\indexController::class, 'delete']);
        Route::get('/stokgrupsearch',[App\Http\Controllers\admin\stok\stokgrup\indexController::class, 'search'])->name('grupsearch');
        Route::get('/stokgrupjvsr/{id}',[App\Http\Controllers\admin\stok\stokgrup\indexController::class, 'respnse']);


        Route::get('/altgrupgetir/{id}',[App\Http\Controllers\admin\stok\stokgrup\indexController::class, 'altgrrespnse']);
        Route::post('/altgrupinsert',[App\Http\Controllers\admin\stok\stokgrup\indexController::class, 'altsgruppost'])->name('altgrup.post');
        Route::get('/altgrupduzgetir/{id}',[App\Http\Controllers\admin\stok\stokgrup\indexController::class, 'altgrduzrespnse']);
        Route::post('/altgrupupdate',[App\Http\Controllers\admin\stok\stokgrup\indexController::class, 'altupdate'])->name('altgredit.post');
        Route::delete('/altsdelete/{id}',[App\Http\Controllers\admin\stok\stokgrup\indexController::class, 'altdelete']);
        Route::post('/grupaltgrupselect',[App\Http\Controllers\admin\stok\stokgrup\indexController::class, 'grupaltsgruppost'])->name('grupaltgrup.post');
        Route::get('/grupaltgrupselectget/{id}',[App\Http\Controllers\admin\stok\stokgrup\indexController::class, 'grupaltsgrupget']);

        Route::get('/marka',[App\Http\Controllers\admin\stok\marka\indexController::class, 'index'])->name('mindex');
        Route::get('/markagetir/{id}',[App\Http\Controllers\admin\stok\marka\indexController::class, 'index'])->name('medit');
        Route::post('/markaupdate',[App\Http\Controllers\admin\stok\marka\indexController::class, 'update'])->name('mredit.post');
        Route::post('/markainsert',[App\Http\Controllers\admin\stok\marka\indexController::class, 'sgruppost'])->name('marka.post');
        Route::delete('/markadelete/{id}',[App\Http\Controllers\admin\stok\marka\indexController::class, 'delete']);
        Route::get('/markasearch',[App\Http\Controllers\admin\stok\marka\indexController::class, 'msearch'])->name('markasearch');
        Route::get('/markajvsr/{id}',[App\Http\Controllers\admin\stok\marka\indexController::class, 'respnse']);

        Route::get('/birim',[App\Http\Controllers\admin\stok\stokbirim\indexController::class, 'index'])->name('bindex');
        Route::post('/birimupdate',[App\Http\Controllers\admin\stok\stokbirim\indexController::class, 'update'])->name('bedit.post');
        Route::post('/biriminsert',[App\Http\Controllers\admin\stok\stokbirim\indexController::class, 'sgruppost'])->name('birim.post');
        Route::delete('/birimdelete/{id}',[App\Http\Controllers\admin\stok\stokbirim\indexController::class, 'delete']);
        Route::get('/birimsearch',[App\Http\Controllers\admin\stok\stokbirim\indexController::class, 'bsearch'])->name('birimsearch');
        Route::get('/birimjvsr/{id}',[App\Http\Controllers\admin\stok\stokbirim\indexController::class, 'respnse']);
        
    });

    Route::group(['namespace'=>'cari','prefix'=>'cari','as'=>'cari.'],function(){
        Route::get('/',[App\Http\Controllers\admin\cari\indexController::class, 'index']);
    });

    Route::group(['namespace'=>'siparis','prefix'=>'siparis','as'=>'siparis.'],function(){
        Route::get('/',[App\Http\Controllers\admin\siparis\indexController::class, 'index']);
    });

    Route::group(['namespace'=>'depo','prefix'=>'depo','as'=>'depo.'],function(){
        Route::get('/',[App\Http\Controllers\admin\depo\indexController::class, 'index'])->name('index');
        Route::get('/depogetir/{id}',[App\Http\Controllers\admin\depo\indexController::class, 'index'])->name('edit');
        Route::post('/depoupdate',[App\Http\Controllers\admin\depo\indexController::class, 'update'])->name('dpedit.post');
        Route::post('/depoinsert',[App\Http\Controllers\admin\depo\indexController::class, 'sgruppost'])->name('depo.post');
        Route::delete('/depodelete/{id}',[App\Http\Controllers\admin\depo\indexController::class, 'delete']);
        Route::get('/deposearch',[App\Http\Controllers\admin\depo\indexController::class, 'search'])->name('deposearch');
        Route::get('/depojvsr/{id}',[App\Http\Controllers\admin\depo\indexController::class, 'respnse']);
        Route::get('/katalogprint',[App\Http\Controllers\admin\depo\indexController::class, 'katalogprint'])->name('dkatalogprint');
    });

    Route::group(['namespace'=>'depohareket','prefix'=>'depohareket','as'=>'depohareket.'],function(){
        Route::get('/',[App\Http\Controllers\admin\depo\depohareket\indexController::class, 'index'])->name('dhindex');
        Route::get('/depohareketgetir/{id}',[App\Http\Controllers\admin\depo\depohareket\indexController::class, 'depohrgt']);
        Route::post('/depohareketupdate',[App\Http\Controllers\admin\depo\depohareket\indexController::class, 'update'])->name('dphredit.post');
        Route::post('/depohareketdelete',[App\Http\Controllers\admin\depo\depohareket\indexController::class, 'delete'])->name('delete');
        Route::get('/depohareketsearch',[App\Http\Controllers\admin\depo\depohareket\indexController::class, 'dhsearch'])->name('depohareketsearch');
    });


    Route::group(['namespace'=>'cari','prefix'=>'cari','as'=>'cari.'],function(){
        Route::get('/',[App\Http\Controllers\admin\cari\indexController::class, 'index'])->name('index'); //+
        Route::post('/save',[App\Http\Controllers\admin\cari\indexController::class, 'store'])->name('create.post');//+
        Route::get('/switch',[App\Http\Controllers\admin\cari\indexController::class, 'switch'])->name('switch');
        Route::get('/carisearch',[App\Http\Controllers\admin\cari\indexController::class, 'search'])->name('carisearch');//+
        Route::get('/sedit/{id}',[App\Http\Controllers\admin\cari\indexController::class, 'sedit'])->name('sedit');
        Route::get('/dpoedit/{id}',[App\Http\Controllers\admin\cari\indexController::class, 'dedit'])->name('sedit');
        Route::get('/depomiktar/{id}',[App\Http\Controllers\admin\cari\indexController::class, 'depomiktars']);
        Route::get('/depomiktarcikan/{id}',[App\Http\Controllers\admin\cari\indexController::class, 'depomiktarcikans']);
        Route::post('/seditupdt',[App\Http\Controllers\admin\cari\indexController::class, 'update'])->name('sedit.post');
        Route::get('/katalogprint',[App\Http\Controllers\admin\cari\indexController::class, 'katalogprint'])->name('crkatalogprint'); //+
        Route::post('/stdepoinst',[App\Http\Controllers\admin\cari\indexController::class, 'stdepoins'])->name('stdepoins.post');
        Route::delete('/sdelete/{id}',[App\Http\Controllers\admin\cari\indexController::class, 'delete']);
        Route::get('/stokdepoalissatis/{ids}/{alsatValue}',[App\Http\Controllers\admin\cari\indexController::class, 'respnsealsat']);
        Route::get('/export', [App\Http\Controllers\admin\cari\indexController::class, 'exportCari'])->name('export'); //+
        Route::post('/import', [App\Http\Controllers\admin\cari\indexController::class, 'importCari'])->name('import');//+
    });    
});
