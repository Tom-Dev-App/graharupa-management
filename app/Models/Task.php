<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory, SoftDeletes;

   protected $fillable = ['project_id', 'user_id', 'status_id', 'description', 'datetime', 'percentage'];

   protected static function booted()
   {
       static::saved(function ($task) {
           \Log::info('Task saved:', ['task_id' => $task->id]);
           $task->project->updatePercentage();
       });
   
       static::updated(function ($task) {
           \Log::info('Task updated:', ['task_id' => $task->id]);
           $task->project->updatePercentage();
       });
   
       static::deleted(function ($task) {
           \Log::info('Task deleted:', ['task_id' => $task->id]);
           $task->project->updatePercentage();
       });
   }
   

   public function project()
   {
       return $this->belongsTo(Project::class)->withTrashed();
   }

   public function status()
   {
       return $this->belongsTo(Status::class);
   }

   public function user()
   {
       return $this->belongsTo(User::class)->withTrashed();
   }

    public function materials(){
       return $this->hasMany(TaskMaterial::class);
    }

    protected $casts = [
      'datetime' => 'datetime',
      'created_at' => 'datetime'
  ];
}
