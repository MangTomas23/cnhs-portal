<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Grade;

class ProgramHeadController extends Controller
{
	public function index() {
		$grades = Grade::all();
		return view('programhead.index', compact('grades'));		
	}
}
