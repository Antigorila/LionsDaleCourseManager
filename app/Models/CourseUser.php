<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class CourseUser extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'course_id', 'seen', 'completed'];

    public function student() : BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function course() : HasOne
    {
        return $this->hasOne(Course::class);
    }
}
