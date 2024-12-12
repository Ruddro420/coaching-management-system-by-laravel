<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdmissionModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'studentId',
        'studentImage',
        'studentNameEn',
        'studentNameBn',
        'motherMobile',
        'email',
        'dob',
        'gender',
        'bloodGroup',
        'birthCertificate',
        'birthCertificateFile',
        'fatherNameEn',
        'fatherNameBn',
        'motherNameEn',
        'motherNameBn',
        'fatherMobile',
        'nid',
        'parentsNidFile',
        'villagePreset',
        'postPreset',
        'thanaPreset',
        'distPreset',
        'villagePermanent',
        'postPermanent',
        'thanaPermanent',
        'distPermanent',
        'classname',
        'session',
        'amount',
        'paymentmethod',
        'pyamentnumber',
        'trxid',
        'admissiondate',
        'invoice',
        'status',
    ];
}
