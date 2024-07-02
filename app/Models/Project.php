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

    protected $fillable = ['name', 'description', 'slug', 'deadline', 'user_id', 'status_id', ];

    protected $casts = [
        'deadline' => 'datetime',
    ];
    

    public function user()  {
        return $this->belongsTo(User::class);
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


}
