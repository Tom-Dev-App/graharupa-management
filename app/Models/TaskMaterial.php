<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TaskMaterial extends Model
{
    use HasFactory, SoftDeletes;

    public function unit() {
        return $this->belongsTo(MaterialUnit::class);
    }

}
