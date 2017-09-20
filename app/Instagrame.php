<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instagrame extends Model
{
    /**
     * Get the user that owns the instagram record.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }    
}
