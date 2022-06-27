<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'user_id',
        'plantatmp_id',
        'produksiatmp_id',
        'created_at',
        'updated_at'
    ];
}
