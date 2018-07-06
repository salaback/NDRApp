<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
    protected $fillable = ['source_author_id', 'url', 'type', 'raw_text'];

    public function SourceAuthor()
    {
        return $this->belongsTo(SourceAuthor::class);
    }
}
