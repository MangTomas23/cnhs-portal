<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Redirect;
use Validator;
use User;

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

		return 'success';

  }}
