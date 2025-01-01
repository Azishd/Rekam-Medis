<?php

namespace App\Policies;

use App\Models\User;
use App\Models\MedicalRecord;

class MedicalRecordPolicy
{
    public function view(User $user, MedicalRecord $record)
    {
        return $user->isAdmin() || $user->isDoctor() || $user->id === $record->patient_id;
    }

    public function update(User $user, MedicalRecord $record)
    {
        return $user->isAdmin() || ($user->isDoctor() && $user->id === $record->doctor_id);
    }

    public function delete(User $user, MedicalRecord $record)
    {
        return $user->isAdmin();
    }
}

