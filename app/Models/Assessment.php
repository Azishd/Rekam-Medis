<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    use HasFactory;

    protected $table = 'assessments';
    protected $fillable = ['datetime', 'status', 'is_verified', 'is_finished', 'notes', 'admin_id'];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function patients()
    {
        return $this->belongsToMany(Patient::class, 'patient_assessment');
    }

    public function doctors()
    {
        return $this->belongsToMany(Doctor::class, 'assessment_doctor');
    }

    public function questions()
    {
        return $this->belongsToMany(Question::class, 'assessment_question');
    }
}
