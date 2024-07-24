<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory, SoftDeletes, sluggable, SluggableScopeHelpers;

    protected $fillable = ['name', 'description', 'slug', 'user_id', 'status_id', 'start_date', 'end_date', 'duration', 'is_hidden', 'percentage'];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'created_at' => 'datetime',
    ];
    

    public function user()  {
        return $this->belongsTo(User::class)->withTrashed();
    }

    public function status() {
        return $this->belongsTo(Status::class);
    }

    public function tasks(){
        return $this->hasMany(Task::class);
    }

    

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name',       // Use the 'name' field to generate the slug
                'maxLength' => 100,        // Optional: Set the maximum length of the slug
                'separator' => '-',       // Optional: Use a hyphen as the separator
                'unique' => true,         // Ensure the slug is unique
                'onUpdate' => true,       // Regenerate the slug on update
            ]
        ];
    }

    public function updatePercentage()
    {
        $tasks = $this->tasks()->where('status_id', '<>', Status::CANCELED)->get();
        $totalTasks = $tasks->count();
    
        if ($totalTasks === 0) {
            $this->percentage = 0;
        } else {
            $totalPercentage = $tasks->sum('percentage');
            $this->percentage = floor($totalPercentage / $totalTasks);
        }
    
        \Log::info('Project percentage updated:', [
            'project_id' => $this->id,
            'total_tasks' => $totalTasks,
            'total_percentage' => $totalPercentage,
            'project_percentage' => $this->percentage,
        ]);
    
        $this->save();
    }
    

}
