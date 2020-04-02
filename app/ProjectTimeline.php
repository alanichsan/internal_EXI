<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectTimeline extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'user_id',
        'project',
        'phase',
        'start',
        'end'
    ];

    protected $table = 'project_timeline';
    public static function get_phase()
    {
        $phase = [
            'Gap Analysis',
            'Create Requirement Document',
            'Purchase Order',
            'Development',
            'UAT',
            'Live',
            'Payment'
        ];
        return $phase;
    }
}
