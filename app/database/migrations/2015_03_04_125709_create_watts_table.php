<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWattsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('watts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('unit_id')->unsigned();
			$table->decimal('watts', 10, 2);
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
		Schema::drop('watts');
	}

}
