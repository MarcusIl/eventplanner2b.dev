<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    use HasFactory;

    protected $table = 'budget';
    
    protected $fillable = [
        'event_id',
        'name',
        'description',
        'amount',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    // Add any other custom methods or relationships here
}
