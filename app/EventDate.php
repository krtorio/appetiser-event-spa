<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventDate extends Model
{
    //
    protected $table = 'event_dates';
    
    public function event()
    {
        return $this->belongsTo('App\Event');
    }
}
