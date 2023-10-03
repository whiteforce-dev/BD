<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'complete_com_name',
    'contact_person',
    'vertical',
    'location',
    'dob',
    'desig',
    'enquiry_type_id',
    'status_id',
    'created_by',
    'user_id',
    'contact',
    'email',
    'next_follow_date',
    'next_follow_time',
    'remark',
    'company_type',
    ];
    protected $guarded = [];

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

    public  function GetManagerRemarks()
    {
        return $this->belongsTo(ManagerRemark::class,'id');
    }
    public function GetUpdatedBirthday()
    {
        return $this->hasMany(AddedBirthday::class, 'enquiry_id');
    }
}
