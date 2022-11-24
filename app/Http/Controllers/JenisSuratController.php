<?php

namespace App\Http\Controllers;

use App\JenisSurat;
use Illuminate\Http\Request;

class JenisSuratController extends Controller
{
    public function index()
    {
        $j = JenisSurat::all();
        return view('jenissurat.index', compact('j'));
    }

    public function save(Request $request)
    {
        JenisSurat::create([
            'nama_jenis' => $request->nama_jenis
        ]);
        return redirect()->back();
    }

    public function delete($id)
    {
        JenisSurat::where('id', $id)->delete();
        return redirect()->back();
    }

    public function update(Request $request)
    {
        JenisSurat::Where('id', $request->id)->update([
            'nama_jenis' => $request->nama_jenis
        ]);
        return redirect()->back();
    }
}
