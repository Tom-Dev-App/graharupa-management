<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AttachmentType extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name'
    ];
    protected const LINK = 1;
    protected const PDF = 2;
    protected const IMAGE = 3;

    public function attachments() {
        return $this->hasMany(Attachment::class);
    }

    
}
