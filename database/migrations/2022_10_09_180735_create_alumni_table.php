<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumniTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumni', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin');
            $table->integer('id_status_menikah');
            $table->integer('id_alumni_angkatan');
            $table->integer('id_jurusan');
            $table->integer('id_posisi_saat_ini');
            $table->string('nama_instansi')->nullable();
            $table->string('bidang_instansi')->nullable();
            $table->string('posisi_pekerjaan')->nullable();
            $table->string('alamat_lengkap')->nullable();
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
        Schema::dropIfExists('alumni');
    }
}
