<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Registration;

class Event extends Model
{
    protected $fillable = [
        'name',
        'date',
        'venue',
        'max_attendees',
        'ticket_price',
    ];

    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }
}