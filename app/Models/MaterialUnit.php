<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MaterialUnit extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'unit'];

    public function task_materials() {
        return $this->hasMany(TaskMaterial::class);
    }
}
