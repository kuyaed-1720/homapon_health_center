<?php

class Appointment
{
    use Model;

    protected $table = 'appointments';
    protected $fillable = [
        'patient_id',
        'doctor',
        'appointment_date',
        'status',
        'completed',
        'appointment_type',
        'rejection_reason',
        'user_id',
        'notification_status',
        'name',
        'contact_number',
        'address'
    ];
}
