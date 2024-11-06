<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Doctor extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'doctors';
    protected $fillable = ['email', 'password', 'firstname', 'lastname', 'address', 'phone', 'gender', 'age', 'admin_id'];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function appointments()
    {
        return $this->belongsToMany(Appointment::class, 'appointment_doctor');
    }

    public function assessments()
    {
        return $this->belongsToMany(Assessment::class, 'assessment_doctor');
    }
}
