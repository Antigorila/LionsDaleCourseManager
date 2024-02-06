<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Question extends Model
{
    use HasFactory;
    protected $fillable = [
        'question',
        'answer',
        'chapter_id',
    ];
    public function user_course() : BelongsTo
    {
        return $this->belongsTo(Chapter::class);
    }

    public function doneTasks() : HasMany
    {
        return $this->hasMany(DoneTask::class);
    }
}
