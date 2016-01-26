<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contractor extends Model
{
 
	protected $primaryKey = 'Contractor_Id';

	public function review()
    {
        return $this->hasOne('App\Review');
    }

}
