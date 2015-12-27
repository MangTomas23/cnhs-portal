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

class AdminController extends Controller
{

  public function registrationForm() {
  	$sections = Section::lists('name', 'id');

    return view('admin.account.create', compact('sections'));            
  }

  public function subjectRegistration() {
  	$subjects = Subject::all();			

    return view('admin.subject.register', compact('subjects'));            
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
		}

		$user->gender = $request->gender;
		$user->birthdate = $request->birthdate;
		$user->address = $request->address;
		$user->contact = $request->contact;
		
		$user->save();

		StudentSection::firstOrCreate([
			'user_id' => $user->id,
			'section_id' => $request->section
		]);


		return Redirect::to('/admin/account/create')
		->with('status', 'Account created successfully.');

  }
}
