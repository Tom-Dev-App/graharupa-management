<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttachmentForItem extends Model
{
    use HasFactory;
    protected const PROJECT = 1;
    protected const TASK = 2;
    protected const COMMENT = 3;

}
