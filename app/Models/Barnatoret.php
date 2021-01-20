<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barnatoret extends Model
{
    use HasFactory;

    protected $table = 'barnatoret';
    protected $fillable = [
        'emri',
        'lokacioni',
        'numri_i_punetoreve',
        'manager'
    ];
}
