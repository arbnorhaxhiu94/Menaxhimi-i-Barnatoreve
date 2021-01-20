<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shitjet extends Model
{
    use HasFactory;

    protected $fillable = [
        'bar_kodi',
        'emri',
        'sasia',
        'cmimi',
        'b_id',
        'totali'
    ];
}
