<?php

namespace App\Http\Controllers;

use App\SuratMasuk;
use Illuminate\Http\Request;

class SuratMasukController extends Controller
{
    public function index()
    {
        $data['surat_masuk'] = SuratMasuk::orderBy('id', 'DESC')->get();
        return view('suratmasuk.index' , $data);
    }
}
