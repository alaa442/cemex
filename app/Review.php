<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class review extends Model
{
    protected $primaryKey = 'Review_Id';

    public function contractor()
    {
        return $this->belongsTo('App\Contractor','foreign_key');
    }
}
