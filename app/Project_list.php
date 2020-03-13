<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project_list extends Model
{
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
