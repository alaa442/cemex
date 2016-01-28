<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contractor extends Model
{
 
	protected $primaryKey = 'Contractor_Id';

	public function getreview()
    {
        return $this->hasOne('App\Review','Contractor_Id');
    }

}
