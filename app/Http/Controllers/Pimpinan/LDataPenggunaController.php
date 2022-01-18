<?php

namespace App\Http\Controllers\Pimpinan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class LDataPenggunaController extends Controller
{
    public function index(){

        $data = User::all();
        
        return view('pimpinan.LDataPengguna', compact('data'));        
    }
}
