<?php

class User
{
    use Model;

    protected $table = 'users';
    protected $fillable = [
        'fullname',
        'email',
        'password',
        'role'
    ];
}
