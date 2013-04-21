<?php

class Comment extends Eloquent{
	
	/*
	Un objet Comment appartient à un Post
	*/
	public function post(){
		return $this->belongs_to('post');
	}

	/*
	Un objet Comment appartient à un utilisateur
	*/
	public function user(){
		return $this->belongs_to('user');
	}

}