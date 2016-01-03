<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Subject;
use App\StudentSubject;
use App\TeacherSubject;
use App\User;
use Redirect;

class UserSubjectController extends Controller
{
	public function create($id) {
		$user = User::find($id);

		if($user->type == 'student') {
			$subjects = Subject::all();
		}else{
			$subjects = Subject::where('department_id', $user->department_id)->get();
		}
		return view('admin.user.subject.add', compact('id','subjects'));
	}

	public function store($id, Request $request) {

		foreach ($request->s_ids as $s_id) {
			$data = ['user_id' => $id, 'subject_id' => $s_id];
			switch(User::find($id)->type) {
				case 'student':
					StudentSubject::firstOrCreate($data);
					break;
				case 'teacher':
					TeacherSubject::firstOrCreate($data);
					break;
			}

		}

		return Redirect::to('/admin/user/' . $id);
	}

	public function delete($id, $s_id) {
		switch (User::find($id)->type) {
			case 'student':
				$subject = StudentSubject::find($s_id);
				break;
			case 'teacher':
				$subject = TeacherSubject::find($s_id);
				break;
		}
		return view('admin.user.subject.delete', compact('subject','id'));
	}

	public function destroy($id, Request $request) {
		switch (User::find($id)->type) {
			case 'student':
				StudentSubject::destroy($request->s_id);
				break;
			case 'teacher':
				TeacherSubject::destroy($request->s_id);
				break;
		}
		return Redirect::to('/admin/user/' . $id);
	}

	public function deleteAll($id) {
		return view('admin.user.subject.delete-all', compact('id'));
	}

	public function destroyAll($id) {
		switch (User::find($id)->type) {
			case 'student':
				StudentSubject::where('user_id', $id)->delete();
				break;
			case 'teacher':
				TeacherSubject::where('user_id', $id)->delete();
				break;
		}

		return Redirect::to('/admin/user/' . $id);
	}
}
