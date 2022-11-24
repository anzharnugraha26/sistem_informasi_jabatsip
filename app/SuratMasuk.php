<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    protected $fillable = [
        'no_surat_masuk', 'no_agenda', 'asal_surat', 'perihal_surat', 'file', 'klasifikasi_surat', 'sifat_surat', 'tgl_surat', 'tgl_terima', 'kabinet' , 'jenis_surat' , 'jenis_file'
    ];
}
