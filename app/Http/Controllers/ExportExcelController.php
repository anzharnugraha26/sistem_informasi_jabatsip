<?php

namespace App\Http\Controllers;

use App\Exports\ExportSurat;
use App\Exports\ExportSuratMasuk;
use Illuminate\Http\Request;
use Excel;


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
        // echo $date1;
        // die();
        $date2 = $request->date2;
        return Excel::download(new ExportSuratMasuk($date1, $date2), 'surat_masuk.csv');
    }
}
