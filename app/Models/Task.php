<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'user_id',
        'name',
        'description',
        'status',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function assignee()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Add any other custom methods or relationships here
}
