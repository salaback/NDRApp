<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promise extends Model
{
    protected $fillable = ['promise_made', 'created_at'];

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
