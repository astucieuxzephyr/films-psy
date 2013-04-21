<?php

/*
Ceci est un MODELE
Eloquent est le nom de l'ORM utilisé par LARAVEL
*/
class User extends Eloquent{
	
	/*
	Un utilisateur poste des articles
	*/
	public function posts(){
		// un utilisateur a plusieurs objets du type post
		// il poste plusieurs articles
		return $this->has_many('post');
	}
	
	/*
	Un utilisateur fait des commentaires
	*/
	public function comments(){
		// un utilisateur a plusieurs commentaires
		return $this->has_many('comment');
	}
}