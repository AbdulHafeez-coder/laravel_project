<?php

namespace App\Models;

use App\Models\Scopes\activeScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'User_id'
    ];

    protected static function booted()
    {
        static::addGlobalScope(ActiveScope::class);
    }
}
