<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdmissionFeeController extends Model
{
    use HasFactory;
    protected $fillable = [
        'studentId',
        'name',
        'sPhone',
        'examDate',
        'examTerm',
        'class',
        'pMethod',
        'amount',
        'pNumber',
        'txid',
        'status',
    ];
}
