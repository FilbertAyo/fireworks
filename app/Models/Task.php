<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'task_name',
        'task_description',
        'task_status',
        'event_date',
        'event_time',
        'event_address',
        'event_email',
        'event_phone',
        'payment_status',
        'total_amount',
    ];
    public function taskProducts()
    {
        return $this->hasMany(TaskProduct::class);
    }
}
