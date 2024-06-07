<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskProgress extends Model
{
    use HasFactory;

    const NOT_PINNED_ON_DASHBOARD = false;

    const PINNED_ON_DASHBOARD = true;

    const INITIAL_PROJECT_PROGRESS = 0;

    protected $fillable = [
        'project_id',
        'progress',
        'pinned_on_dashboard',
    ];

    protected $casts = [
        'pinned_on_dashboard' => 'boolean',
    ];

    protected $guarded = [];
}
