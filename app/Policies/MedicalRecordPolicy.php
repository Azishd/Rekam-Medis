<?php

namespace App\Policies;

use App\Models\MedicalRecord;
use App\Models\User;

class MedicalRecordPolicy
{
    public function viewAny(User $user)
    {
        return in_array($user->role, ['admin', 'doctor', 'patient']);
    }

    public function view(User $user, MedicalRecord $record)
    {
        return $user->role === 'admin' ||
               $user->role === 'doctor' ||
               ($user->role === 'patient' && $record->patient_id === $user->id);
    }

    public function create(User $user)
    {
        return in_array($user->role, ['admin', 'doctor']);
    }

    public function update(User $user, MedicalRecord $record)
    {
        return in_array($user->role, ['admin', 'doctor']);
    }

    public function delete(User $user, MedicalRecord $record)
    {
        return $user->role === 'admin';
    }
}

