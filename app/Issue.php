<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    protected $fillable = ['name', 'description'];


    /**
     *
     * Upper level issue
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parentIssue()
    {
        return $this->belongsTo(Issue::class, 'parent_id');
    }

    /**
     *
     * Sub issues
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function childIssues()
    {
        return $this->hasMany(Issue::class, 'parent_id');
    }

    /**
     *
     * statements related to issue
     *
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function statements()
    {
        return $this->hasMany(Statement::class);
    }

    /**
     *
     * Promises made related to issue
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function promises()
    {
        return $this->hasMany(Promise::class);
    }

    /**
     * Votes held relating to issue
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }
}
