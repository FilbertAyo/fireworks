<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'task_id',
        'product_id',
        'product_name',
        'product_price',
        'product_quantity',
    ];

    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}
