<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('registrations', function(Blueprint $table)
		{
			$table->increments('id');

			$table->integer('booking_id')->unsigned();
			$table->string('contact_name',  100)->nullable();
			$table->string('contact_number', 20)->nullable();
			$table->text('notes')->nullable();

			$table->timestamps();

			$table->foreign('booking_id')->references('id')->on('bookings')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('registrations');
	}

}
