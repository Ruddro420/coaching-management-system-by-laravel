<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentModel extends Model
{
    protected $fillable = [
        'fName',
        'lName',
        'email',
        'rDate',
        'mobile',
        'gender',
        'class',
        'bDate',
        'pName',
        'pMobile',
        'blood',
        'address',
        'pImg',
    ];
}