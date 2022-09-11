<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Validator;
use Auth;
class AuthController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

	use RegistersUsers, AuthenticatesUsers{
		AuthenticatesUsers::redirectPath insteadof RegistersUsers;
		AuthenticatesUsers::guard insteadof RegistersUsers;
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	protected function validator(array $data)
	{
		return Validator::make($data, [
			'name' => 'required|max:255',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|min:6|confirmed',
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	protected function create(array $data)
	{
		return User::create([
			'name' => $data['name'],
			'email' => $data['email'],
			'password' => bcrypt($data['password']),
		]);
	}

	public function postLogin(Request $request){
		$error = $this->validate($request, 
			[
			"email"=>'required|email|max:255', 
			"password"=>'required|min:6'
			]
		);
		if(Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            return redirect('/home');     
        }

	}


	public function getLogin(){
		return view('auth.login');	
	}


	public function getLogout()
	{
		Auth::logout();

		return redirect('/');
	}
}
