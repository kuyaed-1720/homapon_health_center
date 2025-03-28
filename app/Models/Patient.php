<?php

class Patient
{
    use Model;

    protected $table = 'patients';
    protected $fillable = [
        'fullname',
        'age',
        'gender',
        'contact',
        'address',
        'medical_history'
    ];
}
