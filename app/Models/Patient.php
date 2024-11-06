<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class Patient extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    
    protected $table = 'patients';
    protected $fillable = ['email', 'password', 'firstname', 'lastname', 'address', 'phone', 'gender', 'age', 'admin_id'];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function appointments()
    {
        return $this->belongsToMany(Appointment::class, 'patient_appointment');
    }

    public function assessments()
    {
        return $this->belongsToMany(Assessment::class, 'patient_assessment');
    }
}
