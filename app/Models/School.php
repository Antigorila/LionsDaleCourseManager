<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class School extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'contact_name', 'contact_email', 'address'];

    public function student() : HasMany
    {
        return $this->hasMany(User::class);
    }
}
