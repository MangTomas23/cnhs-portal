<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Redirect;
use Validator;
use App\User;
use App\Subject;
use App\Section;
use App\StudentSection;
use App\Department;

class AdminController extends Controller
{

  public function registrationForm() {
  	$sections = Section::lists('name', 'id');
  	$departments = Department::lists('name', 'id');

  	$password = $this->generatePassword();

    return view('admin.account.create', compact('sections', 'departments', 
    	'password'));            
  }

  public function subjectRegistration() {
  	$subjects = Subject::all();			
  	$departments = Department::lists('name', 'id');

    return view('admin.subject.register', compact('subjects','departments'));            
  }

  public function storeAccount(Request $request) {
		$validator = Validator::make($request->all(),[
			'username' => 'required|unique:users',
			'password' => 'required|confirmed|min:6',
			'firstname' => 'required|max:255',
			'lastname' => 'required|max:255',
		]);

		if($validator->fails()) {
  		return Redirect::to('/admin/account/create')->withInput()->withErrors($validator);
		}

		$user = new User;
		$user->username = $request->username;
		$user->password = bcrypt($request->password);
		$user->type = $request->type;
		$user->firstname = $request->firstname;
		$user->middlename = $request->middlename;
		$user->lastname = $request->lastname;

		if($request->type == 'student') {
			$user->year_level = $request->yearlevel;
		}else {
			$user->position = $request->position;
			$user->department_id = $request->department;
		}

		$user->gender = $request->gender;
		$user->birthdate = $request->birthdate;
		$user->address = $request->address;
		$user->contact = $request->contact;
		
		$user->save();

		if($user->type == 'student') {
			StudentSection::firstOrCreate([
				'user_id' => $user->id,
				'section_id' => $request->section
			]);
		}


		return Redirect::to('/admin/account/create')
		->with('status', 'Account created successfully.');

  }

  public function generatePassword() {
  	$keyspace = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
  	$length = 3;
    $str = '';
    $max = mb_strlen($keyspace, '8bit') - 1;
    for ($i = 0; $i < $length; ++$i) {
        $str .= $keyspace[random_int(0, $max)];
    }
    // return $str;

    $n1 = rand(1,9) * 100;
    $n2 = rand(1,9) * 100;

    // return $n1 * 100;

    $randomPass = $str . $n1 . $n2;

    return $randomPass;
  }
}
