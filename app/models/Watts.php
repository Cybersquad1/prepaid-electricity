<?php


class Watts extends Eloquent {

	protected $table = 'watts';
	

	public static function addWatt($unitId,$wattVal){
		//gi-add up ang values sa watt in one minute
		if(Watts::where('unit_id',$unitId)->where('created_at','>',Carbon\Carbon::now()->addMinutes(-1))->count()>0){
			$watts = Watts::where('unit_id',$unitId)->orderBy('created_at','desc')->first();
			$watts->watts += $wattVal;
		}else{
			//mag create utro ug record kung lapas na one minute
			$watts = new Watts;
			$watts->unit_id = $unitId;
			$watts->watts = $wattVal;
		}

		$watts->save();
	}
}