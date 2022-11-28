<?php

namespace App\Http\Controllers;

use App\SuratKeluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SuratKeluarController extends Controller
{
    public function index()
    {
        $k = SuratKeluar::orderBy('id', 'DESC')->get();
        return view('suratkeluar.index', compact('k'));
    }

    public function save(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:jpg,png,jpeg,pdf|max:2048'
        ]);
        $fileName = '';
        if ($request->file != null) {
            if ($request->file->getClientOriginalName()) {
                $file = str_replace(' ', '', $request->file->getClientOriginalName());
                $fileName = date('mYdHs') . rand(1, 999) . '_' . $file;
                $request->file->move('image/file', $fileName);
            }
        }

        $extension = $request->file->getClientOriginalExtension();
        SuratKeluar::create([
            'no_surat_keluar' => $request->no_surat_keluar,
            'no_agenda' => $request->no_agenda,
            'tujuan_surat' => $request->tujuan_surat,
            'perihal_surat' => $request->perihal_surat,
            'file' => $fileName,
            'jenis_file' => $extension,
            'klasifikasi_surat' => $request->klasifikasi_surat,
            'sifat_surat' => $request->sifat_surat,
            'tgl_surat' => $request->tgl_surat,
            'tgl_terima' => $request->tgl_terima,
            'kabinet' => $request->kabinet,
            'jenis_surat' => $request->jenis_surat
        ]);

        return redirect()->back();
    }

    public function delete($id)
    {
        $id = base64_decode($id);
        SuratKeluar::where('id', $id)->delete();
        return redirect()->back();
    }

    public function view($id)
    {

        // echo "ppppp";
        // die();
        $id2 = base64_decode($id);
        $s = DB::table('surat_keluars as surat')
            ->where('surat.id', $id2)
            ->leftjoin('kabinet', 'surat.kabinet', '=', 'kabinet.id')
            ->leftjoin('jenis_surats as jenis', 'surat.jenis_surat', '=', 'jenis.id')
            ->select('surat.*', 'jenis.nama_jenis as jenis_surat', 'kabinet.kode_kabinet', 'kabinet.nama_kabinet', 'kabinet.slot')
            ->first();
        // print_r($s);
        // die();
        return view('suratkeluar.detail', compact('s'));
    }

    public function download($id)
    {
        $s = SuratKeluar::where('id', $id)->first();
        $file = public_path() . "/image/file/" . $s->file;
        $headers = array(
            'Content-Type: application/' . $s->jenis_file,
        );

        $name = $s->file;
        return response()->download($file, $name, $headers);
    }

    public function edit($id)
    {
        $s = SuratKeluar::where('id', $id)->first();

        return view('suratkeluar.edit', compact('s'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'file_baru' => 'mimes:jpg,png,jpeg,pdf|max:2048'
        ]);
        $datalama = SuratKeluar::where('id', $request->id)->first();
        if ($request->c_file == 1) {
            $fileName = '';
            if ($request->file_baru != null) {
                if ($request->file_baru->getClientOriginalName()) {
                    $file = str_replace(' ', '', $request->file_baru->getClientOriginalName());
                    $fileName = date('mYdHs') . rand(1, 999) . '_' . $file;
                    $request->file_baru->move('image/file', $fileName);
                }
            }
            $extension = $request->file_baru->getClientOriginalExtension();
        } else {
            $fileName = $datalama->file;
            $extension = $datalama->jenis_file;
        }
        SuratKeluar::where('id', $request->id)->update([
            'no_surat_keluar' => $request->no_surat_masuk,
            'no_agenda' => $request->no_agenda,
            'tujuan_surat' => $request->asal_surat,
            'perihal_surat' => $request->perihal_surat,
            'file' => $fileName,
            'klasifikasi_surat' => $request->klasifikasi_surat,
            'sifat_surat' => $request->sifat_surat,
            'tgl_surat' => $request->tgl_surat,
            'tgl_terima' => $request->tgl_terima,
            'kabinet' => $request->kabinet,
            'jenis_surat' => $request->jenis_surat,
            'jenis_file' => $extension
        ]);

        return redirect()->back();
    }
}
