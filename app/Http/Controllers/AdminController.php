<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// use Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{

	// public function __construct() {
	//     $this->middleware('web');
	//     $this->middleware('auth');
	// }

  public function registrationForm() {
    return view('admin.account.create');            
  }

  public function subjectRegistration() {
    return view('admin.subject.register');            
  }
}
