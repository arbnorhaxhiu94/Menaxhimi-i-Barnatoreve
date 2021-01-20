<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produktet extends Model
{
    use HasFactory;

    protected $table = 'produktet';
    protected $fillable = [
        'bar_kodi',
        'emri',
        'sasia',
        'cmimi',
        'b_id'
    ];
}
