<?php

/**
 * Modèle POST
**/
class Post extends Eloquent{
	
	/*
	Un objet Post appartient à un utilisateur
	puisque c'est un utilisateur qui poste l'article
	*/
	public function user(){
		return $this->belongs_to('user');
	}

	/*
	Un post peut avoir plusieurs commentaires
	*/
	public function comments(){
		return  $this->has_many('comment');
	}

}