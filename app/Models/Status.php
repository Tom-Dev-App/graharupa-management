<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    public const ON_PROGRESS = 1;
    public const ON_HOLD = 2;
    public const DONE = 3;
    public const CANCELED = 4;


    public function projects () {
        $this->hasMany(Project::class);
    }

    public function tasks () {
        $this->hasMany(Task::class);
    }
}
