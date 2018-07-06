<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{
    protected $fillable = ['name', 'entity_type', 'entity_id'];


    public function person()
    {
        return $this->hasOne(Person::class, 'id','entitiable_id');
    }
    /**
     *
     * All promises made by entities
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function promises()
    {
        return $this->hasMany(Promise::class);
    }

    /**
     *
     * All statements related to entity
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function statements()
    {
        return $this->hasMany(Statement::class);
    }
}
