<?php

class HealthRecord
{
    use Model;

    protected $table = 'health_records';
    protected $fillable = [
        'patient_id',
        'complaint',
        'diagnosis',
        'date'
    ];
}
