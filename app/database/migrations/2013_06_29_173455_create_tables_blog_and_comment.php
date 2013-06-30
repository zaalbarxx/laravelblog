<?php

use Illuminate\Database\Migrations\Migration;

class CreateTablesBlogAndComment extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('blog',function($t){
			$t->increments('id');
			$t->string('title',200);
			$t->string('author',100);
			$t->string('body');
			$t->string('image_path');
			$t->string('tags');
			$t->timestamps();
			$t->string('slug');
		});
			Schema::create('comment',function($t){
			$t->increments('id');
			$t->integer('blog_id');
			$t->string('author',100);
			$t->string('comment');
			$t->boolean('approved');
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
		Schema::drop('blog');
		Schema::drop('comment');
	}

}