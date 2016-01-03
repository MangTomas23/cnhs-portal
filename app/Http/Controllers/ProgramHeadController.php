<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Grade;
use App\Subject;
use Redirect;
use Auth;

class ProgramHeadController extends Controller
{
	public function index() {
		$subjects = Subject::where('department_id', 
			Auth::user()->department_id)->lists('id');

		$grades = Grade::where('approved_status', 1)
		->whereIn('subject_id', $subjects)->get();

		return view('programhead.index', compact('grades'));		
	}

	public function approveGrades(Request $request) {
		foreach ($request->g_id as $id) {
			$grade = Grade::find($id);
			$grade->approved_status = 1;
			$grade->save();
		}
		return Redirect::to('/programhead/approve')->with('status', 
			count($request->g_id) . ' items approved.');
	}
}
