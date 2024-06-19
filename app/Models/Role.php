<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected const MANAGER = 1;
    protected const ADMIN = 2;
    protected const EMPLOYEE = 3;
}
