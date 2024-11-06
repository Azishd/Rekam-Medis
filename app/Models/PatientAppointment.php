<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientAppointment extends Model
{
    use HasFactory;

    protected $table = 'patient_appointment';
    protected $fillable = ['patient_id', 'appointment_id'];
}
