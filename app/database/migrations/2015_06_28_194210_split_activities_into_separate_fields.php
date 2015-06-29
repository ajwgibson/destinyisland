<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SplitActivitiesIntoSeparateFields extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('bookings', function(Blueprint $table)
		{
			$table->string('activity_1', 100)->nullable();
			$table->string('activity_2', 100)->nullable();
			$table->string('activity_3', 100)->nullable();

		});

		Booking::all()->each(function($item) {
			$item->activity_1 = $item->activity;
			$item->save();
		});

		Schema::table('bookings', function(Blueprint $table)
		{
			$table->dropColumn('activity');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('bookings', function(Blueprint $table)
		{
			$table->string('activity', 100)->nullable();
		});

		Booking::all()->each(function($item) {
			$tmp = $item->activity_1 . ', ' . $item->activity_2 . ', ' . $item->activity_3;
			$tmp = substr($tmp, 0, 100);
			$tmp = rtrim($tmp, ', ');
			$item->activity = $tmp;
			$item->save();
		});

		Schema::table('bookings', function(Blueprint $table)
		{
			$table->dropColumn('activity_1');
			$table->dropColumn('activity_2');
			$table->dropColumn('activity_3');
		});
	}

}
