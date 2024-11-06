<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    
    protected $table = 'questions';
    protected $fillable = ['description', 'type', 'admin_id'];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function assessments()
    {
        return $this->belongsToMany(Assessment::class, 'assessment_question');
    }
}
