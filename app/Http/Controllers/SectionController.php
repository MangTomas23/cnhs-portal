<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Section;
use Validator;
use Redirect;

class SectionController extends Controller
{
    public function index() {
    	$sections = Section::all();
    	return view('admin.section.index', compact('sections'));
    }

    public function store(Request $request) {
    	$validator = Validator::make($request->all(), [
    		'name' => 'required|unique:sections|max:20'
    	]);

    	if($validator->fails()) {
    		return Redirect::to('/admin/section')->withErrors($validator);
    	}

    	$section = new Section;

    	$section->name = $request->name;
    	$section->save();

    	return Redirect::to('/admin/section');
    }

    public function edit($id) {
			$section = Section::find($id);
    	return view('admin.section.edit', compact('section'));
    }

    public function delete($id) {
    	$section = Section::find($id);
    	return view('admin.section.delete', compact('section'));
    }

    public function update($id, Request $request) {
    	$validator = Validator::make($request->all(),[
    		'name' => 'required|max:20'
    	]);

    	if($validator->fails()) {
    		return Redirect::to('/admin/section/edit/' . $id)->withErrors($validator);
    	}

    	$section = Section::find($id);

    	$section->name = $request->name;
    	$section->save();

    	return Redirect::to('/admin/section');
    }

    public function destroy($id) {
		Section::destroy($id);    	
    	return Redirect::to('/admin/section');
    }

    public function show($id) {
        $section = Section::find($id);

        return view('admin.section.show', compact('section'));
    }
}
