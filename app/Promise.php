<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promise extends Model
{
    protected $fillable = ['name', 'promise_made'];

    /**
     * Get entities related to promise
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     *
     */

    public function entity()
    {
        return $this->morphedByMany('Entity', 'entitiable');
    }
}
