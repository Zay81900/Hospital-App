<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = [
        'doctor_name',
        'specialization',
        'qualification',
        'experience',
        'profile_image',
        'bio',
        'status'
    ];

    /**
     * Get the appointments associated with the doctor.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    /**
     * Get the users (patients) associated with the doctor through appointments.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function patients()
    {
        return $this->belongsToMany(User::class, 'appointments');
    }
}
