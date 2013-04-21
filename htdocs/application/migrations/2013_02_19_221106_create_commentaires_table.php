<?php

class Create_Commentaires_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		// 
		Schema::create('commentaires', function($table){
			$table->increments('id');
			$table->integer('user_id');
			$table->integer('film_id');
			$table->text('content');
			$table->timestamps(); // ajoute dates de creation et modif
		});
	}

	/**
	 * Revert the changes to the database.
	 * Permet les rollback et annuler le travail effectué
	 *
	 * @return void
	 */
	public function down()
	{
		// detruit la table
		Schema::drop('commentaires');
	}

}