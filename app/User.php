<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function studentSubjects() {
        return $this->hasMany('App\StudentSubject', 'user_id');
    }

    public function teacherSubjects() {
        return $this->hasMany('App\TeacherSubject', 'user_id');
    }

    public function section() {
        return $this->hasOne('App\StudentSection', 'user_id');
    }

}
