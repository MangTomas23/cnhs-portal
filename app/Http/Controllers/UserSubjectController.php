<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Subject;
use App\StudentSubject;
use Redirect;

class StudentSubjectController extends Controller
{
	public function create($id) {
		$subjects = Subject::all();
		return view('admin.user.subject.add', compact('id','subjects'));
	}

	public function store($id, Request $request) {

		foreach ($request->s_ids as $s_id) {
			StudentSubject::firstOrCreate([
				'user_id' => $id,
				'subject_id' => $s_id
			]);

		}

		return Redirect::to('/admin/user/' . $id);
	}

	public function delete($id, $s_id) {
		$subject = StudentSubject::find($s_id);
		return view('admin.user.subject.delete', compact('subject','id'));
	}

	public function destroy($id, Request $request) {
		StudentSubject::destroy($request->s_id);
		return Redirect::to('/admin/user/' . $id);
	}

	public function deleteAll($id) {
		return view('admin.user.subject.delete-all', compact('id'));
	}

	public function destroyAll($id) {
		StudentSubject::where('user_id', $id)->delete();

		return Redirect::to('/admin/user/' . $id);
	}
}
