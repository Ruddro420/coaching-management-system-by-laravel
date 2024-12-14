<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;
    protected $fillable = ['class', 'roll', 'subjects_marks'];

    protected $casts = [
        'subjects_marks' => 'array', // Cast the subjects_marks field as an array
    ];
}
