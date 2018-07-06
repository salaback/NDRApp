<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SourceAuthor extends Model
{
    protected $fillable = ['name', 'type', 'url'];
}
