<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StuffModel extends Model
{
    protected $fillable = [
        'fName',
        'lName',
        'email',
        'jDate',
        'mobile',
        'gender',
        'bDate',
        'education',
        'address',
        'pImg',
    ];
}