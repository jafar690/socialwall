<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facebook extends Model
{
    /**
     * Get the pages for the facebook account.
     */
    public function facebookpages()
    {
        return $this->hasMany('App\FacebookPages');
    }
}
