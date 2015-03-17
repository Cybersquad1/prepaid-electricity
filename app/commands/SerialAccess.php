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

			$read = '';
			$theResult = '';
			$start = microtime(true);
			while ( ($read == '') && (microtime(true) <= $start + 0.5) ) {
				$read = $serial->readPort();
				if ($read != '') {
					$theResult .= $read;
					$read = '';
				}
			}
			
			$theResult = trim($theResult);
			if(!$theResult) continue;
			echo $theResult . "\n";

			$line = explode("\n", $theResult);
			
			foreach($line as $l){
				$l = trim($l);
				$watt_array = explode(" ", $l);
				

				$unitId = 1;
				if ($watt_array[0] == "watt" && isset($watt_array[1]) && $watt_array[1]!=false){
					Watts::addWatt($unitId,$watt_array[1]); //funtion sa models/Watts.php
					Units::lessCredit($unitId,$watt_array[1]);
				}
			}
			$unitId = 1;
			if(Units::hasCredit($unitId)){
				$serial->sendMessage("on");
			}else{
				$serial->sendMessage("off");
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
