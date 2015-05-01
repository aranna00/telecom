<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('specs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->unsignedInteger('phone_id');
			$table->char('spec');
			$table->timestamps();
			$table->foreign('phone_id')->references('id')->on('phones')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('specs');
	}

}
