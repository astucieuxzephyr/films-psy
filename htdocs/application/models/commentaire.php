<?php

class Commentaire extends Eloquent{
	
	/*
	Un objet Commentaire appartient à un Film
	*/
	public function post(){
		return $this->belongs_to('film');
	}

	/*
	Un objet Commentaire appartient à un utilisateur
	*/
	public function user(){
		return $this->belongs_to('user');
	}

}