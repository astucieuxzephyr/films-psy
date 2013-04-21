<?php

class Users {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		// 
		Schema::create('users', function($table){
			$table->increments('id');
			$table->string('username',20);
			$table->string('email'); // 255 par defaut
			$table->string('password');
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
		//
		Schema::drop('users');
	}

}