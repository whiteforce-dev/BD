<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public  function GetDepartment()
    {
        return $this->belongsTo(Department::class,'depertment');
    }

    public  function GetDesignation()
    {
        return $this->belongsTo(Desigination::class,'designation');
    }

    public  function GetCategory()
    {
        return $this->belongsTo(Category::class,'category');
    }

    public  function GetUser()
    {
        return $this->belongsTo(User::class,'created_by');
    }

    public function payrolltargets()
    {
        return $this->hasMany(Target::class,'user_id')->where('type','7')->latest();
    }
    public function temptargets()
    {
        return $this->hasMany(Target::class)->where('type','5')->latest();
    }
    public function fmstargets()
    {
        return $this->hasMany(Target::class,'user_id')->where('type','6')->latest();
    }
    public function recruitmenttargets()
    {
        return $this->hasMany(Target::class)->where('type','4')->latest();
    }
    public function teamtargets()
    {
        return $this->hasMany(TeamTarget::class,'user_id')->latest();
    }

    // User.php (User model)

    public function team()
    {
        return $this->belongsTo(User::class);
    }

}
