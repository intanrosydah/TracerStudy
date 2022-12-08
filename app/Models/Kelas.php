<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'vl_kelas';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
}
