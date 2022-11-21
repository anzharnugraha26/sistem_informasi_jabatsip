<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratKeluarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_keluars', function (Blueprint $table) {
            $table->id();
            $table->string('no_surat_keluar');
            $table->string('no_agenda');
            $table->string('tujuan_surat');
            $table->string('perihal_surat');
            $table->string('file');
            $table->string('klasifikasi_surat');
            $table->string('sifat_surat');
            $table->string('tgl_surat');
            $table->string('tgl_terima');
            $table->string('kabinet');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surat_keluars');
    }
}
