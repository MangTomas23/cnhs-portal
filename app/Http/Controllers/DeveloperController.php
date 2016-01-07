<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Subject;
use App\User;
use App\TemporaryPassword;
use DB;
use File;

class DeveloperController extends Controller
{
    public function index() {
      $users = User::where('type','!=', 'admin')->get();
      $passwords = [];

      foreach ($users as $v) {
        array_push($passwords, $this->generatePassword());
      }

      // return $passwords;


      return view('developer', compact('users', 'passwords'));
    }

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

  public function store(Request $request) {
    $users = User::where('type', '!=' ,'admin')->get();
    $passwords = $request->passwords;

    foreach ($users as $i => $user) {
      $temp = TemporaryPassword::firstOrNew(['user_id' => $user->id]);
      $temp->password = $passwords[$i];
      $temp->save();

      $user->password = bcrypt($passwords[$i]);
      $user->save();
    }

  }

  public function generatePassword() {
    $keyspace = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $length = 3;
    $str = '';
    $max = mb_strlen($keyspace, '8bit') - 1;
    for ($i = 0; $i < $length; ++$i) {
        $str .= $keyspace[random_int(0, $max)];
    }
    $n1 = rand(1,9) * 100;

    $n2 = rand(1,9) * 100;

    $randomPass = $str . $n1 . $n2;
    return $randomPass;
  }
}
