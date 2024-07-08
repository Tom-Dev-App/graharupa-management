<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attachment extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable = [
        'name', 'related_id', 'user_id', 'attachment_for_item_id',
        'attachment_type_id', 'description', 'file_dir', 'filename', 'file_url'
    ];
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function item() {
        return $this->belongsTo(AttachmentForItem::class, 'attachment_for_item_id');
    }

    public function type() {
        return $this->belongsTo(AttachmentType::class, 'attachment_type_id');
    }

    // Cast attributes
    protected $casts = [
        'related_id' => 'integer',
        'user_id' => 'integer',
        'attachment_for_item_id' => 'integer',
        'attachment_type_id' => 'integer',
    ];
}
