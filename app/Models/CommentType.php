<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentType extends Model
{
    use HasFactory;
    public const PROJECT = 1;
    public const TASK = 2;


    public function comments (){
        $this->hasMany(Comment::class);
    }

    
}
