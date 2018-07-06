<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $fillable = ['name', 'federal', 'state'];


    /**
     * Votes taken in the district
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function votes()
    {
        return $this->hasMany(Vote::class);
    }


    /**
     * Parties in the district
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function parties()
    {
        return $this->hasMany(Party::class);
    }
}
