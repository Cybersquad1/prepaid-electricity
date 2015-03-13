<?php
 
class UsersController extends BaseController {
	public function getRegister() {
		return View::make('users.register');
	}

	public function __construct() {
	    $this->beforeFilter('csrf', array('on'=>'post'));
	    $this->beforeFilter('auth', array('only'=>array('getDashboard', 'getPayment', 'populateUnit', 'postPayment')));
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
        if (Auth::attempt(array('username'=>Input::get('username'), 'password'=>Input::get('password')))) {
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

	public function getPayment() {
		return View::make('users.payment');
	}

	public function populateUnit() {

	  // queries the clients db table, orders by client_name and lists client_name and id
	  $unit_options = DB::table('units')->orderBy('number', 'asc')->lists('number','id');

	    return View::make('users.payment', array('unit_options' => $unit_options));
	}

	public function postPayment(){
		$credit = new Creditlog;
	    $credit->unit_id = Input::get('unit');
	    $credit->amount = Input::get('amount');
	    $credit->save();

	    $unit = Units::where('id', Input::get('unit'))->first();
	    $unit -> credit += Input::get('amount');
	    $unit->save();

	    return Redirect::action('UsersController@postPayment')->with('message', 'Success!');
	}

	public function getHome() {
	    return View::make('users.home');
	}

}

