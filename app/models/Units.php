<?php


class Units extends Eloquent {

	protected $table = 'units';

	//function para ma-minus ang credit while ga add ang watt
	public static function lessCredit($unitId, $wattVal){
		$units = Units::where('id', $unitId);
		$units-> credit -= $lessen;
		$units = save();
	}
	
}