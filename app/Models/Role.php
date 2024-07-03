<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use HasFactory;

    public const MANAGER = 1;
    public const ADMIN = 2;
    public const EMPLOYEE = 3;

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
