<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        'task_name',
        'task_description',
        'task_assignee',
        'task_status',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}