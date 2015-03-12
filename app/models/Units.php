<?php


class Units extends Eloquent {

	protected $table = 'units';

	public static function lessCredit($unitId, $wattVal){
		$lessen = $wattVal*0.00001901;

		$units = Units::where('id', $unitId)->first();
		$units->credit -= $lessen;
		$units->save();
	}
	
}