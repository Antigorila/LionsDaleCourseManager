<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'level',
        'type_id',
        'description',
    ];
    public function type() : BelongsTo
    {
        return $this->belongsTo(Type::class);
    }

    public function chapters() : HasMany
    {
        return $this->hasMany(Chapter::class);
    }

    public function user_course() : HasMany
    {
        return $this->hasMany(CourseUser::class);
    }

    public function doneTasks() : HasMany
    {
        return $this->hasMany(DoneTask::class);
    }
}
