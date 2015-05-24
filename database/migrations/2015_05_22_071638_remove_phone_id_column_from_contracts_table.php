<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemovePhoneIdColumnFromContractsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('contracts', function(Blueprint $table)
		{
			$table->dropForeign('contracts_phone_id_foreign');
			$table->dropIndex('contracts_phone_id_foreign');
			$table->dropColumn('phone_id');
			$table->dropColumn('phone_price');
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
			$table->unsignedInteger('phone_id')->after('length');
			$table->foreign('phone_id')->references('id')->on('phones')->onDelete('cascade');
			$table->decimal('phone_cost')->after('phone_id');
		});
	}

}
