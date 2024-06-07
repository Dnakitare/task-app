<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;

    const STATUS_NOT_STARTED = 'not_started';
    const STATUS_ACTIVE = 'active';
    const STATUS_INACTIVE = 'inactive';
    const STATUS_COMPLETED = 'completed';

    protected $guarded = [];

    public static function createSlug($name) {
        $code = Str::random(10) . time();
        return Str::slug($name) . '-' . $code;
    }
}
