<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class ExportSurat implements FromCollection,  WithHeadings
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
        $records = DB::table('surat')->select('*')->where('tanggal_surat', '>=', $this->date1)->where('tanggal_surat', '<=', $this->date2)->get();

        $result = array();
        foreach ($records as $record) {
            $result[] = array(
                'id' => $record->no_surat,
                'tanggal_surat' => $record->tanggal_surat,
                'tanggal_terima' => $record->tanggal_terima,
                'asal_surat' => $record->asal_surat,
                'perihal_surat' => $record->perihal_surat,
                'keterangan' => $record->keterangan,
                'sifat_surat' => $record->sifat_surat,
                'agenda_persip' => $record->agenda_persip,
                'kode_kabinet' => $record->kode_kabinet,
                'kode_kategori' => $record->kode_kategori,
            );
        }

        return collect($result);
    }

    public function headings(): array
    {
        return [
            'No Surat',
            'Tanggal Surat',
            'Tanggal Terima',
            'Asal Surat',
            'Perihal surat',
            'Keterangan',

            'Sifat Surat',
            'Agenda Persip',
            'Kode Kabinet',
            'Kode Kategori',
        ];
    }
}
