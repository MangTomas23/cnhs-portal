<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentSection extends Model
{
	protected $fillable = ['user_id', 'section_id'];

	public function section() {
		return $this->belongsTo('App\Section');
	}

	public function user() {
		return $this->belongsTo('App\User');
	}
}
