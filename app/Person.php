<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $fillable = ['title', 'district', 'first_name', 'last_name', 'gender', 'birthdate','education', 'profession', 'email', 'twitter', 'location', 'picture'];

    protected $casts = [
        'location' => 'array',
        'picture' => 'array'
    ];

    protected $dates = [
        'created_at', 'updated_at', 'birthdate'
    ];

    /**
     * votes cast by person
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function votes()
    {
        return $this->hasMany(CastVote::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }
    public function getCurrentPartyAttribute()
    {
        return $this->parties()->orderBy('start')->first();
    }

    public function parties()
    {
        return $this->hasMany(PartyAffiliation::class);
    }

    public function getNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

}
