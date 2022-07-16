<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisTraining extends Model
{
    use HasFactory;

    protected $table = 'jenis_trainings';

    protected $fillable = [
        'id',
        'nama',
        'created_at',
        'updated_at'
    ];
}
