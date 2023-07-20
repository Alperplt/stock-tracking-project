<?php

namespace App\Http\Controllers\admin\siparis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index(){
        return view('admin.siparis.index');
    }
}
