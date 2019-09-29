<?php

namespace App;

class Contact
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstName', 'lastName', 'email', 'phoneNumber',
    ];
}
