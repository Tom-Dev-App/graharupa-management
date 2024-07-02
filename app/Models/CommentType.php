<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentType extends Model
{
    use HasFactory;
    protected const PROJECT = 1;
    protected const TASK = 2;


    public function comments (){
        $this->hasMany(Comment::class);
    }

    
}
