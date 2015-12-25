<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Redirect;
use Validator;
use App\User;

class AdminController extends Controller
{

  public function registrationForm() {
    return view('admin.account.create');            
  }

  public function subjectRegistration() {
    return view('admin.subject.register');            
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
		$user->section = $request->section;
		$user->year_level = $request->yearlevel;
		$user->gender = $request->gender;
		$user->birthdate = $request->birthdate;
		$user->address = $request->address;
		$user->contact = $request->contact;
		

		return $user->save() ? Redirect::to('/admin/account/create')
		->with('status', 'Account created successfully.'):'Error';

  }

  public function getUsers() {
  	$users = User::where('type', '!=', 'admin')->get();
		return view('admin.users', compact('users'));  	
  }
}
