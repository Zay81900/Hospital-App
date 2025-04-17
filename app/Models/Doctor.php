<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Doctor extends Model
{
    use Notifiable;

    protected $fillable = [
        'doctor_name',
        'specialization',
        'qualification',
        'experience',
        'profile_image',
        'bio',
        'status',
        'email',
        'phone'
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

    /**
     * Get the email address for mail notifications.
     *
     * @return string
     */
    public function routeNotificationForMail()
    {
        return $this->email;
    }
}
