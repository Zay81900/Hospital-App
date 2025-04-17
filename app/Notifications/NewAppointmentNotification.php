<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Appointment;
use Carbon\Carbon;

class NewAppointmentNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $appointment;

    public function __construct(Appointment $appointment)
    {
        $this->appointment = $appointment;
    }

    public function via($notifiable)
    {
        \Illuminate\Support\Facades\Log::info('Notification via method called for doctor: ' . $notifiable->email);
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        try {
            \Illuminate\Support\Facades\Log::info('Preparing email for doctor: ' . $notifiable->email);
            
            $appointmentTime = Carbon::parse($this->appointment->appointment_time)->format('h:i A');
            $appointmentDate = Carbon::parse($this->appointment->appointment_date)->format('F d, Y');

            $message = (new MailMessage)
                ->subject('New Patient Appointment Scheduled')
                ->greeting('Hello Dr. ' . $notifiable->doctor_name)
                ->line('A new patient appointment has been scheduled for you.')
                ->line('Appointment Details:')
                ->line('Date: ' . $appointmentDate)
                ->line('Time: ' . $appointmentTime)
                ->line('Patient Name: ' . $this->appointment->patient->username)
                ->line('Patient Email: ' . $this->appointment->patient->email)
                ->line('Patient Phone: ' . $this->appointment->patient->phone)
                ->when($this->appointment->notes, function ($message) {
                    return $message->line('Additional Notes: ' . $this->appointment->notes);
                })
                ->action('View Appointment Details', url('/doctor/appointments/' . $this->appointment->id))
                ->line('Please review the appointment details and confirm your availability.')
                ->salutation('Best regards,')
                ->salutation('Hospital Management System');

            \Illuminate\Support\Facades\Log::info('Email prepared successfully for doctor: ' . $notifiable->email);
            return $message;
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Email Error: ' . $e->getMessage());
            \Illuminate\Support\Facades\Log::error('SMTP Configuration: ' . json_encode([
                'host' => config('mail.mailers.smtp.host'),
                'port' => config('mail.mailers.smtp.port'),
                'encryption' => config('mail.mailers.smtp.encryption'),
                'username' => config('mail.mailers.smtp.username'),
            ]));
            throw $e;
        }
    }
} 