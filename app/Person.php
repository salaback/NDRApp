<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $fillable = ['title', 'district'];


    /**
     * votes cast by person
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function votes()
    {
        return $this->hasMany(CastVote::class);
    }
}
