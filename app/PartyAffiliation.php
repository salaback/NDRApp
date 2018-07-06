<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PartyAffiliation extends Model
{
    protected $fillable = ['party_id', 'person_id', 'start', 'end', 'end_type', 'sources'];
}
