<?php


class Watts extends Eloquent {

	protected $table = 'watts';
	

	public static function addWatt($unitId,$wattVal){
		if(Watts::where('unit_id',$unitId)->where('created_at','>',Carbon\Carbon::now()->addMinutes(-1))->count()>0){
			$watts = Watts::where('unit_id',$unitId)->orderBy('created_at','desc')->first();
			$watts->watts += $wattVal;
		}else{
			$watts = new Watts;
			$watts->unit_id = $unitId;
			$watts->watts = $wattVal;
		}

		$watts->save();
	}
}