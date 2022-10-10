<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlumniAngkatan extends Model
{
    use HasFactory;

    protected $table = 'vl_alumni_angkatan';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
}
