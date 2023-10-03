<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddedBirthday extends Model
{
    use HasFactory;
    protected $table='added_birthdays';

    public function enquiry()
    {
        return $this->belongsTo(Enquiry::class, 'enquiry_id');
    }
}
