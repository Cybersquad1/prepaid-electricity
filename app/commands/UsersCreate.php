<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class UsersCreate extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'user:create';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Create a user.';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		$firstname = $this->ask('Enter Firstname');
		$lastname = $this->ask('Enter Lastname');
		$username = $this->ask('Enter Username');
		$password = $this->secret('Enter Password');
		$password2 = $this->secret('Confirm Password');



		$data = array(
			'firstname'=>$firstname,
			'lastname'=>$lastname,
			'username'=>$username,
			'password'=>$password,
			'password_confirmation'=>$password2,
		);

		$validator = Validator::make($data, User::$rules);
 
	    if ($validator->passes()) {
	        $user = new User;
		    $user->firstname = $firstname;
		    $user->lastname = $lastname;
		    $user->username = $username;
		    $user->password = Hash::make($password);
		    $user->save();

		    $this->info('Success!');
	    } else {
	        foreach($validator->messages()->all() as $message){
	        	$this->error($message);
	        }
	    } 
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array(
			//array('example', InputArgument::REQUIRED, 'An example argument.'),
		);
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array(
			//array('example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null),
		);
	}

}
