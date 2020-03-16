<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserInformation extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'users_id', 
        'name',
        'alamat', 
        'gender', 
        'date_of_birth', 
        'place_of_birth', 
        'nik', 
        'tanggal_bergabung', 
        'tanggal_lulus_probation', 
        'department', 
        'jabatan', 
        'role',
    ];

    protected $table = 'users_information';
    public function info()
    {
        return $this->belongsTo(User::class);
    }
}
