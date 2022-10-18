<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Alumni extends Model
{
    use HasFactory;

    protected $table = 'alumni';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    public function statusPernikahan()
    {
        return $this->belongsTo(statusPernikahan::class, 'id_status_menikah', 'id');
    }

    public function alumniAngkatan()
    {
        return $this->belongsTo(alumniAngkatan::class, 'id_alumni_angkatan', 'id');
    }

    public function jurusan()
    {
        return $this->belongsTo(jurusan::class, 'id_jurusan', 'id');
    }

    public function posisiSaatIni()
    {
        return $this->belongsTo(posisiSaatIni::class, 'id_posisi_saat_ini', 'id');
    }
}
