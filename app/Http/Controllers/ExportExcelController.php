<?php

namespace App\Http\Controllers;

use App\Exports\ExportSurat;
use App\Exports\ExportSuratKeluar;
use App\Exports\ExportSuratMasuk;
use Illuminate\Http\Request;
use Excel;
use Illuminate\Support\Facades\DB;

class ExportExcelController extends Controller
{
    public function export(Request $request)
    {
        $date1 = $request->date1;
        // echo $date1;
        // die();
        $date2 = $request->date2;
        return Excel::download(new ExportSurat($date1, $date2), 'surat.csv');
    }

    public function index()
    {
        return view('laporan.index');
    }

    public function suratmasuk()
    {
        return view('laporan.suratmasuk');
    }

    public function exportSuratMasuk(Request $request)
    {
        $date1 = $request->date1;
        $date2 = $request->date2;
        $s = DB::table('data_surats as surat')
            ->where('surat.tgl_surat', '>=', $date1)
            ->where('surat.tgl_surat', '<=', $date2)
            ->where('klasifikasi_surat',  1)
            ->join('kabinet', 'surat.kabinet', '=', 'kabinet.id')
            ->join('jenis_surats as jenis', 'surat.jenis_surat', '=', 'jenis.id')
            ->join('kategori as kat', 'surat.klasifikasi_surat', '=', 'kat.id')
            ->select('surat.*', 'jenis.nama_jenis as jenis_surat', 'kabinet.kode_kabinet', 'kabinet.nama_kabinet', 'kabinet.slot', 'kat.nama_kategori')
            ->get();
        return view('datasurat.excel', compact('s'));
    }

    public function exportSuratKeluar(Request $request)
    {
        $date1 = $request->date1;
        // echo $date1;
        // die();
        $date2 = $request->date2;
        return Excel::download(new ExportSuratKeluar($date1, $date2), 'surat_keluar.csv');
    }

    public function suratkeluar()
    {
        return view('laporan.suratkeluar');
    }
}
