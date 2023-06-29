<?php

namespace App\Models;

use App\Models\User;
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

}
