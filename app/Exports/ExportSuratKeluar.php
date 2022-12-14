<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;

class ExportSuratKeluar implements FromCollection,  WithHeadings
{
    private $date1;
    private $date2;

    public function __construct($date1, $date2)
    {
        $this->date1 = $date1;
        $this->date2 = $date2;
    }

    public function collection()
    {
        $records = DB::table('data_surats as surat')->select('*')
            ->where('surat.tgl_surat', '>=', $this->date1)
            ->where('surat.tgl_surat', '<=', $this->date2)
            ->where('klasifikasi_surat',  2)
            ->join('kabinet', 'surat.kabinet', '=', 'kabinet.id')
            ->join('jenis_surats as jenis', 'surat.jenis_surat', '=', 'jenis.id')
            ->join('kategori as kat', 'surat.klasifikasi_surat', '=', 'kat.id')
            ->select('surat.*', 'jenis.nama_jenis as jenis_surat', 'kabinet.kode_kabinet', 'kabinet.nama_kabinet', 'kabinet.slot', 'kat.nama_kategori')
            ->get();

        $result = array();
        foreach ($records as $record) {
            $result[] = array(
                'no_surat' => $record->no_surat,
                'no_agenda' => $record->no_agenda,
                'asal_surat' => $record->asal_surat,
                'perihal_surat' => $record->perihal_surat,
                'klasifikasi_surat' => $record->nama_kategori,
                'sifat_surat' => $record->sifat_surat,
                'tgl_surat' => $record->tgl_surat,
                'tgl_terima' => $record->tgl_terima,
                'kabinet' => $record->nama_kabinet,
                'kode_kabinet' => $record->kode_kabinet,
                'jenis_surat' => $record->jenis_surat,
            );
        }



        return collect($result);
    }

    public function headings(): array
    {
        return [

            'No Surat',
            'No Agenda',
            'Asal Surat',
            'Perihal surat',
            'Klasifikasi Surat',
            'Sifat Surat',
            'Tanggal Surat',
            'Tanggal Terima',
            'Kabinet',
            'Kode Kabinet',
            'Jenis_surat',
        ];
    }
}
