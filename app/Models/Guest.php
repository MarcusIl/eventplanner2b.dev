<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;
    protected $fillable = [
        'guest_name',
        'guest_email',
        'guest_rsvp',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
