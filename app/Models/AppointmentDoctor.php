<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentDoctor extends Model
{
    use HasFactory;

    protected $table = 'appointment_doctor';
    protected $fillable = ['appointment_id', 'doctor_id'];
}
