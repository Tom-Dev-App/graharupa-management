<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use HasFactory;

    public const ADMIN = 1;
    public const USER = 2;

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
