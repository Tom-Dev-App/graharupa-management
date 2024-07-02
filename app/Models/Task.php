<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory, SoftDeletes;


    public function Project() {
       return $this->belongsTo(Project::class);
    }

    public function user() {
       return $this->belongsTo(User::class);
    }

    public function staus() {
      return  $this->belongsTo(Status::class);
    }

    public function task_materials(){
       return $this->hasMany(TaskMaterial::class);
    }
}
