<?php

namespace App\Http\Controllers;

use App\SuratMasuk;
use Illuminate\Http\Request;

class SuratMasukController extends Controller
{
    public function index()
    {
        $data['surat_masuk'] = SuratMasuk::orderBy('id', 'DESC')->get();
        return view('suratmasuk.index', $data);
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
        SuratMasuk::create([
            'no_surat_masuk' => $request->no_surat_masuk,
            'no_agenda' => $request->no_agenda,
            'asal_surat' => $request->asal_surat,
            'perihal_surat' => $request->perihal_surat,
            'file' => $fileName,
            'klasifikasi_surat' => $request->klasifikasi_surat,
            'sifat_surat' => $request->sifat_surat,
            'tgl_surat' => $request->tgl_surat,
            'tgl_terima' => $request->tgl_terima,
            'kabinet' => $request->kabinet
        ]);

        return redirect()->back();
    }

    public function hapus($id)
    {
        SuratMasuk::where('id' , $id)->delete();
        return redirect()->back();
    }
}
