<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssessmentDoctor extends Model
{
    use HasFactory;
    
    protected $table = 'assessment_doctor';
    protected $fillable = ['assessment_id', 'doctor_id'];
}
