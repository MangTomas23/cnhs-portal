<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeacherSection extends Model
{
  protected $fillable = ['user_id', 'section_id'];

  public function section() {
  	return $this->belongsTo('App\Section');
  }
}
