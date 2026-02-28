<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = [
        'section_id',
        'title',
        'content_type',
        'content_url',
        'duration',
    ];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
