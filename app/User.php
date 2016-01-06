<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Nicolaslopezj\Searchable\SearchableTrait;

class User extends Authenticatable
{
    use SearchableTrait;
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

    protected $searchable = [
        'columns' => [
            'users.firstname' => 10,
            'users.middlename' => 10,
            'users.lastname' => 10,
            'users.username' => 10,
            'users.address' => 10,
            'users.contact' => 10,
        ],
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

    public function sections() {
        return $this->hasMany('App\TeacherSection', 'user_id');
    }

    public function grades() {
        return $this->hasMany('App\Grade');
    }

    public function department() {
        return $this->belongsTo('App\Department');
    }

    public function tpassword() {
        return $this->hasOne('App\TemporaryPassword', 'user_id');
    }
}
