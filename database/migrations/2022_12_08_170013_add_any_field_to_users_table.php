<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAnyFieldToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('nis')->nullable();
            $table->string('username')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('wali_kelas')->nullable();
            $table->integer('id_jurusan')->nullable();
            $table->integer('id_alumni_angkatan')->nullable();
            $table->string('nomor_telepon')->nullable();
            $table->integer('id_status_menikah')->nullable();
            $table->string('tahun_menikah')->nullable();
            $table->integer('id_posisi_saat_ini')->nullable();
            $table->string('nama_instansi')->nullable();
            $table->string('bidang_instansi')->nullable();
            $table->string('jurusan_kuliah')->nullable();
            $table->string('posisi_pekerjaan')->nullable();
            $table->string('alamat_lengkap')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('nis')->nullable();
            $table->dropColumn('username')->nullable();
            $table->dropColumn('tempat_lahir')->nullable();
            $table->dropColumn('tanggal_lahir');
            $table->dropColumn('jenis_kelamin');
            $table->dropColumn('wali_kelas')->nullable();
            $table->dropColumn('id_jurusan');
            $table->dropColumn('id_alumni_angkatan');
            $table->dropColumn('nomor_telepon')->nullable();
            $table->dropColumn('id_status_menikah');
            $table->dropColumn('tahun_menikah')->nullable();
            $table->dropColumn('id_posisi_saat_ini');
            $table->dropColumn('nama_instansi')->nullable();
            $table->dropColumn('bidang_instansi')->nullable();
            $table->dropColumn('jurusan_kuliah')->nullable();
            $table->dropColumn('posisi_pekerjaan')->nullable();
            $table->dropColumn('alamat_lengkap')->nullable();
        });
    }
}
