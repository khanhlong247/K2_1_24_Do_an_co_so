<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalRecord extends Model
{
    use HasFactory;


    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }


    protected $fillable = [
        'doctor_id',
        'name',
        'email',
        'phone',
        'age',
        'cccd',
        'service',
        'exam_date',
        'cost',
        'status',
        'diagnosis',
        'prescription',
        'notes'
    ];
}