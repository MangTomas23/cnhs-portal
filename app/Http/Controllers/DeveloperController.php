<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Subject;
use App\User;
use DB;
use File;

class DeveloperController extends Controller
{
    public function getTable(Request $request) {
    	return DB::table($request->table)->get();
    }

    public function seed(Request $request) {
    	$filename = $request->table_name . '.json';
			$request->file('json')->move(
		      base_path() . '/public/seeds/', $filename
		  );

		  $json = File::get(base_path() .'/public/seeds/'. $request->table_name . 
		  	'.json');
      $data = json_decode($json);

      DB::table($request->table_name)->delete();

      foreach ($data as $row) {
      	$array = [];
      	foreach ($row as $key => $value) {
      		$array[$key] = $value;
      	}

      	DB::table($request->table_name)->insert($array);
      }

    	// return $data;
    }
}
