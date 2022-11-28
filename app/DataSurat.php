<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataSurat extends Model
{
    protected $fillable = [
        'no_surat', 'no_agenda', 'asal_surat', 'perihal_surat', 'file', 'klasifikasi_surat', 'sifat_surat', 'tgl_surat', 'tgl_terima', 'kabinet' , 'jenis_surat' , 'jenis_file'
    ];
}
