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
     */
    public function everMembers()
    {
        return $this->hasManyThrough(Person::class,'party_affiliations', 'party_id', 'person_id');
    }

    /**
     *
     * All current memebers
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function currentMembers()
    {
        return $this->hasManyThrough(Person::class,'party_affiliations', 'party_id', 'person_id');
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

}
