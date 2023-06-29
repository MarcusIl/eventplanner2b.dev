<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_name',
        'event_date',
        'event_location',
        'event_description',
    ];

    public function guests()
    {
        return $this->hasMany(Guest::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function budgets()
    {
        return $this->hasMany(Budget::class);
    }
}