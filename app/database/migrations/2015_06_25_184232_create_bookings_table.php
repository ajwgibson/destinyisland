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
			$table->string('group_name', 25)->nullable();
			$table->string('activity_1', 100)->nullable();
			$table->string('activity_2', 100)->nullable();
			$table->string('activity_3', 100)->nullable();
			$table->string('contact_name',  100)->nullable();
			$table->string('contact_number', 20)->nullable();
			$table->boolean('photos_permitted')->nullable();
			$table->boolean('outings_permitted')->nullable();
			$table->string('notes')->nullable();

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
