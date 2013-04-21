<?php

class Comments {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		// 
		Schema::create('comments', function($table){
			$table->increments('id');
			$table->integer('user_id');
			$table->integer('post_id');
			$table->text('content');
			$table->timestamps(); // ajoute dates de creation et modif
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		// detruit la table
		Schema::drop('comments');
	}

}