<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataSuratsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_surats', function (Blueprint $table) {
            $table->id();
            $table->string('no_surat_masuk');
            $table->string('no_agenda');
            $table->string('asal_surat');
            $table->string('perihal_surat');
            $table->string('file');
            $table->string('jenis_file');
            $table->string('klasifikasi_surat');
            $table->string('sifat_surat');
            $table->string('tgl_surat');
            $table->string('tgl_terima');
            $table->string('kabinet');
            $table->string('jenis_surat');
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
        Schema::dropIfExists('data_surats');
    }
}
