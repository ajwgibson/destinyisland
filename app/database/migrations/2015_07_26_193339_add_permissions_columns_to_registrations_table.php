<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPermissionsColumnsToRegistrationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('registrations', function(Blueprint $table)
		{
			$table->boolean('photos_permitted')->nullable();
			$table->boolean('outings_permitted')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('registrations', function(Blueprint $table)
		{
			$table->dropColumn('photos_permitted');
			$table->dropColumn('outings_permitted');
		});
	}

}
