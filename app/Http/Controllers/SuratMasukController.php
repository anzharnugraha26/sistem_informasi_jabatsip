<?php

namespace App\Http\Controllers;

use App\SuratMasuk;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SuratMasukController extends Controller
{
    public function index()
    {
        $data['surat_masuk'] = SuratMasuk::orderBy('id', 'DESC')->get();
        return view('suratmasuk.index', $data);
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
            'kabinet' => $request->kabinet,
            'jenis_surat' => $request->jenis_surat,
            'jenis_file' => $extension
        ]);

        return redirect()->back();
    }

    public function hapus($id)
    {
        SuratMasuk::where('id', $id)->delete();
        return redirect()->back();
    }

    public function view($id)
    {
        $s = DB::table('surat_masuks as surat')
            ->where('surat.id', $id)
            ->join('kabinet', 'surat.kabinet', '=', 'kabinet.id')
            ->join('jenis_surats as jenis', 'surat.jenis_surat', '=', 'jenis.id')
            ->select('surat.*', 'jenis.nama_jenis as jenis_surat', 'kabinet.kode_kabinet', 'kabinet.nama_kabinet', 'kabinet.slot')
            ->first();

        return view('suratmasuk.detail', compact('s'));
    }

    public function download($id)
    {
        $s = SuratMasuk::where('id', $id)->first();
        $file = public_path() . "/image/file/" . $s->file;
        $headers = array(
            'Content-Type: application/' . $s->jenis_file,
        );

        $name = $s->file;
        return response()->download($file, $name, $headers);
    }

    public function edit($id)
    {
        $s = DB::table('surat_masuks as surat')
            ->where('surat.id', $id)
            ->join('kabinet', 'surat.kabinet', '=', 'kabinet.id')
            ->join('jenis_surats as jenis', 'surat.jenis_surat', '=', 'jenis.id')
            ->select('surat.*', 'jenis.nama_jenis as jenis_surat', 'kabinet.kode_kabinet', 'kabinet.nama_kabinet', 'kabinet.slot')
            ->first();

      return view('suratmasuk.edit' , compact('s'));
    }
}
