<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSoftDeletesToMultipleTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('contract_phone', function(Blueprint $table) {
			$table->softDeletes();
		});
		Schema::table('users', function(Blueprint $table) {
			$table->softDeletes();
		});
		Schema::table('contracts', function(Blueprint $table) {
			$table->softDeletes();
		});
		Schema::table('phone_user', function(Blueprint $table) {
			$table->softDeletes();
		});
		Schema::table('phones', function(Blueprint $table) {
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('contract_phone', function(Blueprint $table) {
			$table->dropSoftDeletes();
		});
		Schema::table('users', function(Blueprint $table) {
			$table->dropSoftDeletes();
		});
		Schema::table('contracts', function(Blueprint $table) {
			$table->dropSoftDeletes();
		});
		Schema::table('phone_user', function(Blueprint $table) {
			$table->dropSoftDeletes();
		});
		Schema::table('phones', function(Blueprint $table) {
			$table->dropSoftDeletes();
		});
	}

}
