<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherModel extends Model
{
    protected $fillable = [
        'fName',
        'lName',
        'email',
        'jDate',
        'mobile',
        'gender',
        'designation',
        'dept',
        'bDate',
        'education',
        'address',
        'pImg',
    ];
}