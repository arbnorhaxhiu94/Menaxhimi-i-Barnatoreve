<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Punetoret extends Model
{
    use HasFactory;
    protected $table = 'punetoret';

    protected $fillable = [
        'emri',
        'pozita',
        'paga',
        'aktiv',
        'b_id'
    ];
}
