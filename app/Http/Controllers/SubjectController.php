<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Subject;
use Validator;
use Redirect;

class SubjectController extends Controller
{
    public function store(Request $request) {
    	$validator = Validator::make($request->all(),[
    		'subject_code' => 'required|max:30|unique:subjects',
    		'description' => 'required|max:255',
    		'year_level' => 'required'
    	]);

    	if($validator->fails()) {
    		return Redirect::to('/admin/subject/register')->withErrors($validator);
    	}

    	$subject = new Subject;

    	$subject->subject_code = $request->subject_code;
    	$subject->description = $request->description;
    	$subject->year_level = $request->year_level;

    	$subject->save();


    }
}
