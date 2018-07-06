<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
    protected $fillable = ['name', 'url', 'district_id'];

    public function federalParty()
    {
        return $this->belongsTo(Party::class, 'parent_id');
    }

    /**
     * All memebers ever affliliated with party
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function everMembers()
    {
        return $this->belongsToMany(Person::class,'party_affiliations', 'party_id', 'person_id')->withPivot(['start', 'end'])->orderBy('start');
    }

    /**
     *
     * All current memebers
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function currentMembers()
    {
        return $this->everMembers()->whereNull('pivot.end');
    }
}
