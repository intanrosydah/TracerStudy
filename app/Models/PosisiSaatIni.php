<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PosisiSaatIni extends Model
{
    use HasFactory;

    protected $table = 'vl_posisi_saat_ini';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
}
