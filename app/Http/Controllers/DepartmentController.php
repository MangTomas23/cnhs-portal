<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DepartmentController extends Controller
{
	public function index() {
		return view('admin.department.index');
	}
}
