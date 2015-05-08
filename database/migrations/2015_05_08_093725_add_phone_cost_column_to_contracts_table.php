<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPhoneCostColumnToContractsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('contracts', function(Blueprint $table)
		{
			$table->decimal('phone_price')->after('phone_id');
			$table->char('length')->after('cost');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('contracts', function(Blueprint $table)
		{
			$table->dropColumn('phone_price');
			$table->dropColumn('length');
		});
	}

}
