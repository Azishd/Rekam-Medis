<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientAssessment extends Model
{
    use HasFactory;
    
    protected $table = 'patient_assessment';
    protected $fillable = ['patient_id', 'assessment_id'];
}
