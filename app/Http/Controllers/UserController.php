<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use Auth;
use App\Models\User;
use Redirect;


class UserController extends Controller
{

	public function authenticate() {
		return view("user.auth");
	}

	public function register() {
		return view("user.register");
	}

	public function attemptLogin(LoginRequest $request) {
		$credentials = $request->except(('_token'));

		if (Auth::attempt($credentials))
            return redirect()->route('home');
        else 
        	return Redirect::back()->withErrors(["User Not found"]);
	}


	public function attemptRegister(RegistrationRequest $request) {
		$user = new User($request->all());
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->route('home');
	}


	public function logout() {
		Auth::logout();
		return redirect()->route('home');
	}

}
