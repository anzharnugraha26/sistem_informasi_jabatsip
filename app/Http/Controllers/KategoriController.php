<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    public function index()
    {
        $data['k'] = DB::table('kategori')->get();
        $data['c'] = DB::table('kategori')->count();
        return view('kategori.index', $data);
    }

    public function tambah()
    {
        $data['flag'] = 0;
        return view('kategori.form', $data);
    }

    public function save(Request $request)
    {
        // echo $request->kode_kategori;
        // die();
        DB::table('kategori')->insert([
            'kode_kategori' => $request->kode_kategori,
            'nama_kategori' => $request->nama_kategori,
        ]);
        return redirect('kategori');
    }

    public function delete($id)
    {
        DB::table('kategori')->where('id', $id)->delete();
        return redirect()->back();
    }

    public function edit($id)
    {
        $data['flag'] = 1;
        $data['k'] = DB::table('kategori')->where('id', $id)->first();
        return view('kategori.form', $data);
    }

    public function update(Request $request)
    {
        DB::table('kategori')->where('id', $request->id)->update([
            'kode_kategori' => $request->kode_kategori,
            'nama_kategori' => $request->nama_kategori,
        ]);
        return redirect('kategori');
    }
}
