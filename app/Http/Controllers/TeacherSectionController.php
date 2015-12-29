<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Section;
use App\TeacherSection;
use Redirect;

class TeacherSectionController extends Controller
{
	public function add($id) {
		$sections = Section::orderBy('name')->get();
		return view('admin.user.section.add', compact('id', 'sections'));
	}

	public function store($id, Request $request) {
		foreach ($request->s_ids as $s_id) {
			TeacherSection::firstOrCreate(['user_id' => $id, 'section_id' => $s_id]);
		}
		return Redirect::to('/admin/user/' . $id);
	}
}
