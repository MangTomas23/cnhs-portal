<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Subject;
use DB;

class DeveloperController extends Controller
{
    public function getTable(Request $request) {
    	return DB::table($request->table)->get();
    }
}
