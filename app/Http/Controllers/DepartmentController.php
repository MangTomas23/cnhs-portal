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

		return Redirect::to('/admin/department');
	}

	public function delete($id) {
		$department = Department::find($id);
		return view('admin.department.delete', compact('department'));
	}

	public function destroy(Request $request) {
		Department::destroy($request->department_id);

		return Redirect::to('/admin/department');
	}

	public function edit($id) {
		$department = Department::find($id);
		return view('admin.department.edit', compact('department'));
	}

	public function update(Request $request) {
		$department = Department::find($request->department_id);		
		$department->name = $request->name;
		$department->program_head = $request->program_head;
		$department->save();

		return Redirect::to('/admin/department');
	}
}
