<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Chapter extends Model
{
    use HasFactory;

    public function questions() : HasMany
    {
        return $this->hasMany(Question::class);
    }

    public function course() : BelongsTo
    {
        return $this->belongsTo(Course::class);
    }
}
