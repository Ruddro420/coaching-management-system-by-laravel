<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeesModel extends Model
{
    protected $fillable = [
        'roll',
        'stdName',
        'course',
        'feeType',
        'amount',
        'cDate',
        'pType',
        'pRef',
        'status',
        'pDetails',
    ];
}