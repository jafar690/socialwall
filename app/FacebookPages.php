<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacebookPages extends Model
{
    /**
     * Get the Facebook account that owns the page.
     */
    public function facebook()
    {
        return $this->belongsTo('App\Facebook');
    }
}
