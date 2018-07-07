<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CastVote extends Model
{
    protected $fillable = ['vote_id', 'person_id', 'vote'];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    /**
     * The vote in which this vote was cast
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function poll()
    {
        return $this->belongsTo(Vote::class, 'vote_id');
    }
}
