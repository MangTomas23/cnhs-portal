<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
	public function programHead() {
		return $this->hasOne('App\User', 'department_id');		
	}
}
