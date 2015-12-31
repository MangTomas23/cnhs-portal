<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Section;
use Auth;

class TeacherController extends Controller
{
	public function section() {
		$sections = User::find(Auth::user()->id)->sections;
		return view('teacher.section.index', compact('sections'));
	}

	public function subject() {
		$subjects = User::find(Auth::user()->id)->teacherSubjects;
		return view('teacher.subject.index', compact('subjects'));
	}

	public function input() {
		$sections = User::find(Auth::user()->id)->sections;
		$subjects = User::find(Auth::user()->id)->teacherSubjects;
		return view('teacher.grade.input', compact('sections', 'subjects'));
	}

	public function students(Request $request) {
		$section_id = $request->section;
		$subject_id = $request->subject;

		$students = Section::find($section_id)->students;

		foreach ($students as $i => $student) {
			$student->user;
			$studentSubjects = $student->user->studentSubjects;

			$found = false;
			foreach ($studentSubjects as $subject) {
				if($subject->subject_id == $subject_id) {
					$found = true;
				}
			}

			$student['valid'] = $found;
		}

		return $students->where('valid', true);
	}
}
