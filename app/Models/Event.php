<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Query\Builder;

class Event extends Model
{
    /**
     * @return HasMany
     */
    public function workshops()
    {
        return $this->hasMany(Workshop::class);
    }
    
    /**
     * Scope a query to only include popular users.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return Builder
     */
    public function scopeFuture(Builder $query)
    {
        return $query
            ->join('workshops', 'workshops.event_id', '=', 'events.id')
            ->where('workshops.start', '>', date('Y-m-d H:i:s'));
    }
}
