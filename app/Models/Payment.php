<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = ['assignment_id','task_id', 'user_id', 'amount','expense_type'];

    public function assignment()
    {
        return $this->belongsTo(Assignment::class);
    }

    public function employee()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
