<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'content',
        'project',
        'priority'
    ];
    protected $table = 'development_request';
}
