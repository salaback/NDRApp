<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CastVote extends Model
{
    protected $fillable = ['vote_id', 'person_id', 'vote'];

    /**
     * The vote in which this vote was cast
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function vote()
    {
        return $this->belongsTo(Vote::class);
    }
}
