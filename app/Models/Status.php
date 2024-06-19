<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    protected const ON_PROGRESS = 1;
    protected const ON_HOLD = 2;
    protected const DONE = 3;
    protected const CANCELED = 4;
}
