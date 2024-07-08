<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttachmentForItem extends Model
{
    use HasFactory;
    public const PROJECT = 1;
    public const TASK = 2;
    
    protected $fillable = [
        'name'
    ];


    public function attachments() {
        return $this->hasMany(Attachment::class);
    }

}
