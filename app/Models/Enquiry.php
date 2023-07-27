<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    use HasFactory;
    public  function GetEnquiryType()
    {
        return $this->belongsTo(EnquiryType::class,'enquiry_type_id');
    }

    public  function GetUser()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public  function GetCreatedby()
    {
        return $this->belongsTo(User::class,'created_by');
    }

    public  function GetStatus()
    {
        return $this->belongsTo(Followup_remark::class,'status_id');
    }


    public  function GetSchool()
    {
        return $this->belongsTo(School::class,'school_id');
    }
}
