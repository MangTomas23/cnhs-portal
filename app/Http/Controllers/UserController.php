<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Section;
use App\Subject;
use App\StudentSubject;
use App\StudentSection;
use App\Department;
use Validator;
use Redirect;

class UserController extends Controller
{
	public function index(Request $request) {
		$type = $request->type=='' ? 'student':$request->type;
		$users = User::where('type', $type)->get();
		return view('admin.user.index', compact('users', 'type'));  	
	}

	public function show($id) {
		$user = User::find($id);
		$sections = Section::lists('name', 'id');
		$departments = Department::lists('name', 'id');


		$subjects = $user->type == 'student' ? $user->studentSubjects:
		$user->teacherSubjects;	

		return view('admin.user.show', compact('user', 'sections', 'subjects', 'departments'));
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

		if($user->type == 'student') {
			$user->year_level = $request->year_level;
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
			if(count($user->section)) {
				$section = $user->section;
			}else {
				$section = new StudentSection;
				$section->user_id = $user->id;
			}
			$section->section_id = $request->section;
			$section->save();
		}

		return Redirect::to('/admin/user/' . $id);
	}
}
