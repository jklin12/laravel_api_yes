<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasiensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasiens', function (Blueprint $table) {
            $table->string('no_rekam_medis')->primary();
            $table->string('pasien_nama');
            $table->string('pasien_alamat');
            $table->string('pasien_telp',50);
            $table->enum('pasien_jenis_kelamin',['L','P']);
            $table->string('pasien_tempat_lahir',50);
            $table->date('pasien_tgl_lahir');
            $table->string('pasien_pekerjaan');
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
        Schema::dropIfExists('pasiens');
    }
}
