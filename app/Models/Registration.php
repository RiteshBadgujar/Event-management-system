<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Event;

class Registration extends Model
{
    protected $fillable = [
        'event_id',
        'attendee_name',
        'attendee_email',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}