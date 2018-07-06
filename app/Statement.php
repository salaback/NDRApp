<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statement extends Model
{
    protected $fillable = ['statement', 'source_id'];
}
