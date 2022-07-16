<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTraining extends Model
{
    use HasFactory;

    protected $table = 'detail_trainings';
    protected $fillable = [
        'id',
        'identitas_id',
        'jenis_training_id',
        'nama_training',
        'tgl_training',
        'tgl_sertifikat',
        'no_sertifikat',
        'no_reg',
        'vendor',
        'img',
        'created_at',
        'updated_at'
    ];
}
