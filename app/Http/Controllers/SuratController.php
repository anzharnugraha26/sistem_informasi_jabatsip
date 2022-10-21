<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SuratController extends Controller
{
    function index()
    {
        $s = DB::table('surat')->get();
        $c = DB::table('surat')->count();
        return view('surat.index', compact('s', 'c'));
    }

    function create()
    {
        $data['k'] = DB::table('kategori')->get();
        $data['kb'] = DB::table('kabinet')->get();
        return view('surat.create', $data);
    }

    public function save(Request $request)
    {
        $fileName = '';
        if ($request->file != null) {
            if ($request->file->getClientOriginalName()) {
                $file = str_replace(' ', '', $request->file->getClientOriginalName());
                $fileName = date('mYdHs') . rand(1, 999) . '_' . $file;
                $request->file->move('image/file', $fileName);
            }
        }
        // print_r($request->all());
        // die();
        DB::table('surat')->insert([
            'no_surat' => $request->no_surat,
            'tanggal_surat' => $request->tanggal_surat,
            'tanggal_terima' => $request->tanggal_terima,
            'asal_surat' => $request->asal_surat,
            'perihal_surat' => $request->perihal_surat,
            'keterangan' => $request->keterangan,
            'gambar' => $fileName,
            'sifat_surat' => $request->sifat_surat,
            'kode_kabinet' => $request->kode_kabinet,
            'kode_kategori' => $request->kode_kategori,
            'agenda_persip' => $request->agenda_persip
        ]);
        return redirect('surat');
    }

    public function delete($id)
    {
        DB::table('surat')->where('id', $id)->delete();
        return redirect()->back();
    }

    public function edit($id)
    {
        $data['s'] =  DB::table('surat')->where('id', $id)->first();
        $data['k'] = DB::table('kategori')->get();
        $data['kb'] = DB::table('kabinet')->get();
        return view('surat.edit', $data);
    }

    public function update(Request $request)
    {
        $datalama = DB::table('surat')->where('id', $request->id)->first();
        if ($request->pilih_file == 1) {
            $fileName = '';
            if ($request->file_baru != null) {
                if ($request->file_baru->getClientOriginalName()) {
                    $file = str_replace(' ', '', $request->file_baru->getClientOriginalName());
                    $fileName = date('mYdHs') . rand(1, 999) . '_' . $file;
                    $request->file_baru->move('image/file', $fileName);
                }
            }
        } else {
            $fileName = $datalama->gambar;
        }

        $array = [
            'no_surat' => $request->no_surat,
            'tanggal_surat' => $request->tanggal_surat,
            'tanggal_terima' => $request->tanggal_terima,
            'asal_surat' => $request->asal_surat,
            'perihal_surat' => $request->perihal_surat,
            'keterangan' => $request->keterangan,
            'gambar' => $fileName,
            'sifat_surat' => $request->sifat_surat,
            'kode_kabinet' => $request->kode_kabinet,
            'kode_kategori' => $request->kode_kategori,
            'agenda_persip' => $request->agenda_persip
        ];

        DB::table('surat')->where('id', $request->id)->update($array);

        return redirect('surat');
    }

    public function view($id)
    {
        $l = DB::table('surat')->where('id', $id)->first();
        return view('surat.view', compact('l'));
    }
}
