<?php

class Films {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		// 
		Schema::create('films', function($table){
			$table->increments('id');
			$table->unique('id'); // indiquer identifiant unique
			$table->string('titre',250); // 255 par defaut
			$table->string('titre_FR',250); // 255 par defaut
			$table->string('titre_ENG',250); // 255 par defaut
			$table->string('realisateur'); // 255 par defaut
			$table->string('acteurs');
			$table->string('type'); // type du film : documentaire, fiction, comédie
			$table->string('duree');
			$table->string('annee_production');
			$table->text('synopsis'); // petit synopsis
			$table->string('theme'); // theme : amour, guerre
			$table->string('tags_psy');
			$table->string('lien_defaut');
			$table->string('lien_allocine');
			$table->timestamps(); // ajoute dates de creation et modif
			// type_film
			// lien vers images
			// tags
			// tags_psy
			// 
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
		Schema::drop('films');
	}

}