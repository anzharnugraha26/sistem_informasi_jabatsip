<?php

namespace App\Http\Controllers;

use App\SuratKeluar;
use Illuminate\Http\Request;

class SuratKeluarController extends Controller
{
    public function index()
    {
        $k = SuratKeluar::orderBy('id', 'DESC')->get();
        return view('suratkeluar.index', compact('k'));
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
        SuratKeluar::create([
            'no_surat_keluar' => $request->no_surat_keluar,
            'no_agenda' => $request->no_agenda,
            'tujuan_surat' => $request->tujuan_surat,
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

   
}
