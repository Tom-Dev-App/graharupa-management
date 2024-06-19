<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AttachmentType extends Model
{
    use HasFactory, SoftDeletes;
    protected const PDF = 1;
    protected const IMAGE = 2;
    protected const LINK = 3;
    protected const TEXT = 4;
}
