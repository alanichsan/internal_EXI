<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Request extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'user_id',
        'title',
        'content',
        'project',
        'priority'
    ];
    protected $table = 'development_request';
    public function project()
    {
        return $this->belongsTo(Project_list::class);
    }
}
