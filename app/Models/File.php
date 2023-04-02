<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'url',
        'type',
        'chapter_id'
    ];

    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }
}
