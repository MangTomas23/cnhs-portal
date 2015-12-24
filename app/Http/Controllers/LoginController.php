<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Validator;
use View;
use LoginRequest;

class LoginController extends Controller
{
    // public function 

	public function index(Request $request) {
		return View::make('login')->withErrors(null)->withInput([]);
	}

	public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|max:255',
            // 'email' => 'required|email|max:256|unique:users',
            'password' => 'required|min:6',
            ]);

        if($validator->fails()) {
            return View::make('login')->withErrors($validator)->withInput($request->all());
        }

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            // Authentication passed...
            return redirect()->intended('/about');
        }else {
            return View::make('login')->withErrors(['This credentials does not match our records.']);
        }
    }
}
