<?php

use Illuminate\Database\Migrations\Migration;

class AddTableContactMessages extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contact_messages',function($t){
			$t->increments('id');
			$t->string('name',40);
			$t->string('email');
			$t->string('subject',80);
			$t->string('message',1024);
			$t->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('contact_messages');
	}

}