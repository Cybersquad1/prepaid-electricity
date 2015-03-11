<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreditsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('creditlogs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('unit_id')->unsigned();
			$table->decimal('amount', 10, 2);
			$table->timestamps();

			$table->foreign('unit_id')
		      ->references('id')->on('units')
		      ->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('creditlogs');
	}

}
