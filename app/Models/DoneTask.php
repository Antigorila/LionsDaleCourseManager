<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DoneTask extends Model
{
    use HasFactory;

    protected $fillable = [ 'user_id', 'question_id', 'course_id' ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function question() : BelongsTo
    {
        return $this->belongsTo(Question::class);
    }

    public function course() : BelongsTo
    {
        return $this->belongsTo(Course::class);
    }
}
