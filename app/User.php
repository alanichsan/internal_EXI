<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function users_information()
    {
        return $this->hasMany(UserInformation::class, 'users_id');
    }
    public function report()
    {
        return $this->hasMany(Report::class, 'user_id', 'id');
    }
    public static function get_role()
    {
        $role = [
            'Staff',
            'Manager',
            'Director'
        ];
        return $role;
    }
    public static function get_department()
    {
        $department = [
            'IT',
            'Marketing',
            'Operational',
            'Finance'
        ];
        return $department;
    }
    public static function get_gender()
    {
        $gender = [
            'Male',
            'Female'
        ];
        return $gender;
    }
}
