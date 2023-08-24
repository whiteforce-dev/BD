<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Target extends Model
{
    use HasFactory;
    protected $table = 'mothly_target';

    protected $fillable = [
        'user_id',
        'month_target',
        'target',
        'complete',
        'remaining',
        'type',
        'date',
        // Add other attributes that you want to allow for mass assignment
    ];
}
