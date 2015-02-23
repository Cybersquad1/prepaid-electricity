<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class SerialAccess extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'serial:access';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Access the serial.';

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
		while(true){


			$serial = new PhpSerial;

			// First we must specify the device. This works on both linux and windows (if
			// your linux serial device is /dev/ttyS0 for COM1, etc)
			$serial->deviceSet($this->argument('device'));

			// We can change the baud rate, parity, length, stop bits, flow control
			$serial->confBaudRate(9600);
			$serial->confParity("none");
			$serial->confCharacterLength(8);
			$serial->confStopBits(1);
			$serial->confFlowControl("none");

			$serial->deviceOpen();


			do{
				$raw = $serial->readPort();
				$raw = trim($raw);
			}while($raw=='');
			
			echo $raw . "\n";
			
			$line = explode("\n", $raw);
			
			foreach($line as $l){
				$l = trim($l);
				$watt_array = explode(" ", $l);
				

				$unitId = 1;
				if ($watt_array[0] == "watt" && isset($watt_array[1]) && $watt_array[1]!=false){
					Watts::addWatt($unitId,$watt_array[1]);
				}
			}

				
			
			$serial->deviceClose();


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
			array('device', InputArgument::REQUIRED, 'Device argument.'),
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
