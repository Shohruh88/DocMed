<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    public $fillable = [
        'full_name',
        'special',
        'start_date',
        'picture'
    ];

    protected $casts = [
        'start_date' => 'date'
    ];
}
