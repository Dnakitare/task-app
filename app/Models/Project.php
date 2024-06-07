<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;

    const STATUS_NOT_STARTED = 'not_started';

    const STATUS_ACTIVE = 'active';

    const STATUS_INACTIVE = 'inactive';

    const STATUS_COMPLETED = 'completed';

    protected $fillable = [
        'name',
        'slug',
        'start_date',
        'end_date',
        'status',
    ];

    protected $guarded = [];

    public function task_progress(): HasOne
    {
        return $this->hasOne(TaskProgress::class);
    }

    public static function createSlug($name)
    {
        $code = Str::random(10).time();

        return Str::slug($name).'-'.$code;
    }
}
