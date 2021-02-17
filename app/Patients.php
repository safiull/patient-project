<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patients extends Model
{
    protected $fillable = [
        'patient_id',
        'patient_name',
        'address',
        'mobile',
        'blood_group',
        'age',
        'sex'
    ];

}
