<?php

/**
 * Modèle POST
**/
class Film extends Eloquent{
	
	/*
	Un objet Film est lié / appartient à un utilisateur
	puisque c'est un utilisateur qui poste le film
	*/
	/*	
	public function user(){
		return $this->belongs_to('user');
	}
	*/

	/*
	Un film peut avoir plusieurs commentaires
	*/
	public function comments(){
		return  $this->has_many('comment');
	}

}