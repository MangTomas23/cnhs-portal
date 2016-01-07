<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TemporaryPassword extends Model
{
	protected $fillable = ['user_id'];
}
