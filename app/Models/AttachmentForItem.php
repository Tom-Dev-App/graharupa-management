<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttachmentForItem extends Model
{
    use HasFactory;
    public const PROJECT = 1;
    public const TASK = 2;
    // PINDAH JADI PROJECT DAN TASK AJA ATTACHMENTS PROJECT MIRIP DENGAN COMMENTS JADI 1 AJA
    // public const COMMENT = 3;


    public function attachments() {
        return $this->hasMany(Attachment::class);
    }
}
