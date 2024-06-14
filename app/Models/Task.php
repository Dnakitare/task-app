<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    const STATUS_NO_STARTED = 'no_started';

    const STATUS_PENDING = 'pending';

    const STATUS_COMPLETED = 'completed';

    protected $fillable = [
        'name',
        'status',
        'project_id',
    ];

    protected $guarded = [];

    public function task_members()
    {
        return $this->belongsToMany(Member::class, 'task_members')->withPivot('project_id');
    }

    public function changeTaskStatus($status)
    {
        $this->update(['status' => $status]);
    }
}
