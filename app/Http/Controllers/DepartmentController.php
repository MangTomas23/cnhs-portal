<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Department;
use Validator;
use Redirect;

class DepartmentController extends Controller
{
	public function index() {
		$departments = Department::all();
		return view('admin.department.index', compact('departments'));
	}

	public function store(Request $request) {
		$validator = Validator::make($request->all(),[
			'name' => 'required|max:50|unique:departments'
		]);

		if($validator->fails()) {
			return Redirect::to('/admin/department')->withErrors($validator)
			->withInput();
		}

		$department = new Department;
		$department->name = $request->name;
		$department->program_head = $request->program_head;
		$department->save();

		return $request->all();
	}
}
