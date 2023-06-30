<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'organizer_id',
        'name',
        'date',
        'location',
        'description',
    ];

    public function organizer()
    {
        return $this->belongsTo(User::class, 'organizer_id');
    }

    // Event.php (Event model)

public function guests()
{
    return $this->belongsToMany(User::class, 'invitations', 'event_id', 'user_id')
                ->withPivot('status')
                ->withTimestamps();
}

    

    public function budgets()
    {
        return $this->hasMany(Budget::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
    public function invitations()
{
    return $this->hasMany(Invitation::class);
}


    // Add any other custom methods or relationships here
}
