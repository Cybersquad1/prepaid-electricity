<?php
 
class UsersController extends BaseController {
	public function getRegister() {
		return View::make('users.register');
	}

	public function __construct() {
	    $this->beforeFilter('csrf', array('on'=>'post'));
	    $this->beforeFilter('auth', array('only'=>array('getDashboard')));
	}

	public function postCreate() {
        $validator = Validator::make(Input::all(), User::$rules);
 
	    if ($validator->passes()) {
	        $user = new User;
		    $user->firstname = Input::get('firstname');
		    $user->lastname = Input::get('lastname');
		    $user->email = Input::get('email');
		    $user->password = Hash::make(Input::get('password'));
		    $user->save();

		    return Redirect::action('UsersController@postCreate')->with('message', 'Thanks for registering!');
	    } else {
	        return Redirect::action('UsersController@postCreate')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();    
	    } 
	}

	public function getLogin() {
	    return View::make('users.login');
	}

	public function postSignin() {
        if (Auth::attempt(array('email'=>Input::get('email'), 'password'=>Input::get('password')))) {
		    return Redirect::action('UsersController@getDashboard')->with('message', 'You are now logged in!');
		} else {
		    return Redirect::action('UsersController@getLogin')
		        ->with('message', 'Your username/password combination was incorrect')
		        ->withInput();
		}     
	}

	public function getDashboard() {
	    return View::make('users.dashboard');
	}

	public function getLogout() {
     Auth::logout();
	    return Redirect::action('UsersController@getLogin')
	    ->with('message', 'Your are now logged out!');
	}

}

