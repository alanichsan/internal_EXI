<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'content',
        'project',
        'start',
        'end'
    ];

    protected $table = 'daily_report';
    public function report()
    {
        return $this->belongsTo(User::class);
    }
}
