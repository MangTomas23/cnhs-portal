<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Auth;

class TeacherController extends Controller
{
	public function section() {
		$sections = User::find(Auth::user()->id)->sections;
		return view('teacher.section.index', compact('sections'));
	}

	public function subject() {
		return view('teacher.subject.index');
	}

	public function input() {
		return view('teacher.grade.input');
	}
}
