<?php

class Posts {

	/**
	 * Make changes to the database.
	 * Cette fonction sert à faire les changements dans la base de données concernant la table posts
	 * @return void
	 */
	public function up()
	{
		// 
		Schema::create('posts', function($table_posts){
			$table_posts->increments('id');
			$table_posts->string('title',100);
			$table_posts->text('content');
			$table_posts->integer('user_id');
			$table_posts->timestamps(); // ajoute dates de creation et modif
			
		});
	}
	/**
	 * Revert the changes to the database.
	 * Permet les rollback et annuler le travail effectué
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('posts');
	}

}