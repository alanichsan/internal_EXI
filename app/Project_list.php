<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project_list extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'projects_id', 
        'projects_name',
        'perusahaan', 
        'status_projects'
    ];

    protected $table = 'projects_list';

    public function report()
    {
        return $this->hasMany(Report::class, 'project', 'projects_id');
    }
}
