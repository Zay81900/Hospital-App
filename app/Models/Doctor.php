<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Doctor extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $guard = 'doctor';

    protected $fillable = [
        'doctor_name',
        'email',
        'password',
        'phone',
        'specialization',
        'experience',
        'qualification',
        'bio',
        'profile_image',
        'availability',
        'status'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'availability' => 'array',
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
