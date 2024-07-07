<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class TaskMaterial extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['name', 'user_id', 'material_unit_id', 'quantity', 'description', 'is_carried', 'task_id'];

        // Define the relationships with soft deletes
        public function unit()
        {
            return $this->belongsTo(MaterialUnit::class, 'material_unit_id')->withTrashed();
        }

        public function user()
        {
            return $this->belongsTo(User::class)->withTrashed();
        }

        public function task()
        {
            return $this->BelongsTo(Task::class, 'task_id')->withTrashed();
        }

        protected $casts = [
            'datetime' => 'datetime',
            'created_at' => 'datetime'
        ];
}
