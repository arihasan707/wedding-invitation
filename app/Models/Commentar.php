<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commentar extends Model
{
    protected $fillable = [
        'nama',
        'text'
    ];
}
