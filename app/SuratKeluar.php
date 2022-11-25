<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    protected $fillable = [
        'no_surat_keluar', 'no_agenda', 'tujuan_surat', 'perihal_surat', 'file', 'jenis_file' ,'klasifikasi_surat', 'sifat_surat', 'tgl_surat', 'tgl_terima', 'kabinet', 'jenis_surat'
    ];
}
