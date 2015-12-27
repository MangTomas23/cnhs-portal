<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Section;
use App\Subject;
use App\StudentSubject;
use Validator;
use Redirect;

class UserController extends Controller
{
	public function index() {
		$users = User::where('type', '!=', 'admin')->get();
		return view('admin.user.index', compact('users'));  	
	}

	public function show($id) {
		$user = User::find($id);
		$sections = Section::lists('name', 'id');
		$subjects = $user->subjects;

		return view('admin.user.show', compact('user', 'sections', 'subjects'));
	}

	public function update($id, Request $request) {

		$validator = Validator::make($request->all(), [
			'firstname' => 'required|max:255',
			'lastname' => 'required|max:255',
		]);

		if($validator->fails()) {
			return Redirect::to('/admin/user/' . $id)->withErrors($validator);
		}

		$user = User::find($id);
		$user->firstname = $request->firstname;
		$user->middlename = $request->middlename;
		$user->lastname = $request->lastname;
		$user->year_level = $request->year_level;
		$user->gender = $request->gender;
		$user->birthdate = $request->birthdate;
		$user->address = $request->address;
		$user->contact = $request->contact;
		$user->save();

		$section = $user->section;
		$section->section_id = $request->section;
		$section->save();

		return Redirect::to('/admin/user/' . $id);
	}
}