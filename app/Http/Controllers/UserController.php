<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
	public function index() {
		$users = User::where('type', '!=', 'admin')->get();
		return view('admin.user.index', compact('users'));  	
	}

	public function show($id) {
		$user = User::find($id);

		return view('admin.user.show', compact('user'));
	}
}
