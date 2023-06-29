<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'budget_name',
        'budget_description',
        'budget_amount',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
