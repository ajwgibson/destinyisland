<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bookings', function(Blueprint $table)
		{
			$table->increments('id');

			$table->string('first', 100);
			$table->string('last', 100);
			$table->string('school_year', 10)->nullable();
			$table->integer('age')->unsigned()->nullable();
			$table->string('notes')->nullable();
			$table->string('activity', 100)->nullable();
			$table->string('group_number', 10)->nullable();

			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('bookings');
	}

}
