<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Remark extends Model
{
    use HasFactory;
    public  function GetStatus()
    {
        return $this->belongsTo(Followup_remark::class,'status_id');
    }

    public  function GetUser()
    {
        return $this->belongsTo(User::class,'created_by');
    }
}
