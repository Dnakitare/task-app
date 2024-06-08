<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    const STATUS_PENDING = 'pending';
    
    const STATUS_COMPLETED = 'completed';

    protected $fillable = [
        'name',
        'status',
        'project_id',
    ];

    protected $guarded = [];
}
