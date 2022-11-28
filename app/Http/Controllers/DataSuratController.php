<?php

namespace App\Http\Controllers;

use App\DataSurat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataSuratController extends Controller
{
    public function suratmasuk()
    {
        $data['flag'] = 1;
        $data['s'] = DataSurat::orderBy('id', 'DESC')->where('klasifikasi_surat', 1)->get();
        return view('datasurat.index', $data);
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

        DataSurat::create([
            'no_surat' => $request->no_surat_masuk,
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

    public function delete($id)
    {
        $id = base64_decode($id);
        DataSurat::where('id', $id)->delete();
        return redirect()->back();
    }

    public function view($id)
    {
        $s = DB::table('data_surats as surat')
            ->where('surat.id', $id)
            ->leftjoin('kabinet', 'surat.kabinet', '=', 'kabinet.id')
            ->leftjoin('jenis_surats as jenis', 'surat.jenis_surat', '=', 'jenis.id')
            // ->leftjoin('kategori as kat', 'surat.klasifikasi_surat', '=', 'kat.id')
            ->select('surat.*', 'jenis.nama_jenis as jenis_surat', 'kabinet.kode_kabinet', 'kabinet.nama_kabinet', 'kabinet.slot')
            ->first();

        return view('datasurat.detail', compact('s'));
    }

    public function download($id)
    {
        $s = DataSurat::where('id', $id)->first();
        $file = public_path() . "/image/file/" . $s->file;
        $headers = array(
            'Content-Type: application/' . $s->jenis_file,
        );

        $name = $s->file;
        return response()->download($file, $name, $headers);
    }

    public function edit($id)
    {

        $s = DB::table('data_surats as surat')
            ->where('surat.id', $id)
            ->join('kabinet', 'surat.kabinet', '=', 'kabinet.id')
            ->join('jenis_surats as jenis', 'surat.jenis_surat', '=', 'jenis.id')
            ->select('surat.*', 'jenis.nama_jenis as jenis_surat', 'kabinet.kode_kabinet', 'kabinet.nama_kabinet', 'kabinet.slot')
            ->first();

        return view('datasurat.edit', compact('s'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'file_baru' => 'mimes:jpg,png,jpeg,pdf|max:2048'
        ]);
        $datalama = DataSurat::where('id', $request->id)->first();
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
        DataSurat::where('id', $request->id)->update([
            'no_surat' => $request->no_surat_masuk,
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

    public function suratkeluar()
    {
        $data['flag'] = 0;
        $data['s'] = DataSurat::orderBy('id', 'DESC')->where('klasifikasi_surat', 2)->get();
        return view('datasurat.index', $data);
    }
}
