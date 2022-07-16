<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Identitas extends Model
{
    use HasFactory;
    protected $table = 'identitases';
    protected $fillable= [
        'id',
        'jenissite_id',
        'nik',
        'nama',
        'jabatan',
        'created_at',
        'updated_at'
    ];
}
