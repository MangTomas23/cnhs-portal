<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
class StudentController extends Controller
{
	public function index() {
		$grades =  Auth::user()->grades->where('approved_status', 1);
		return view('student.index', compact('grades'));
	}
}
