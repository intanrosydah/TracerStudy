<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddManyFieldToAlumniTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('alumni', function (Blueprint $table) {
            $table->string('nis')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->integer('id_kelas')->nullable();
            $table->integer('jurusan_kuliah')->nullable();
            $table->string('wali_kelas')->nullable();
            $table->string('nomor_telepon')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('alumni', function (Blueprint $table) {
            $table->dropColumn('nis');
            $table->dropColumn('tempat_lahir');
            $table->dropColumn('id_kelas');
            $table->dropColumn('jurusan_kuliah');
            $table->dropColumn('wali_kelas');
            $table->dropColumn('nomor_telepon');
        });
    }
}
