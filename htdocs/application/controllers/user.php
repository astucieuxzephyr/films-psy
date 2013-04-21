<?php
/* Controleur utilisateurs */
class User_Controller extends Base_Controller {

/**
 CONSTRUCTEUR
*/
	function __construct(){
		// on commence par lancer le constructeur parent (Base_Controller)
		parent::__construct();

		// FILTRES sur les actions : ces filtres permettent de limiter les actions
		// cf. http://laravel.com/docs/controllers#action-filters
		// avant de charger cette action on verifie que la personne est authentifiee et on lie à la fonction index
		$this->filter('before','auth')->only(array('index','logout'));

		// les actions comment et add
		// $this->filter('before','auth')->only(array('comment','add'));

		// filtre special avec gestion de tokens pour la securité (failles csrf Cross site Request for jury ?)
		// avant de charger cette action on vérifie que la personne est authentifiée et on lie
		// on(get) - on(post) - on(put) - on(delete) sont les possibilités.
		$this->filter('before','csrf')->on('post');
	}

/**
 Action user.index 
 Possibilité ici de développer un Espace membre
*/
	public function action_index()
	{
		echo 'bienvenue '.Auth::user()->username; // pas besoin de ECHO !!

		// Section::injecte() permet d'injecter des données dans la vue
		// ici on injecte un titre dans la vue, ce sera récupéré par blade avec @yield('titre')
		// Section::inject('titre', 'Mon blog | Accueil'); 
		Section::inject('titre', 'Mon blog | Mon profil'); 

		// éventuellement récupérer des données du modèle !!
		// $posts = Post::all();

		return View::make('user.index');
		// ->with('posts',$posts);
	}
/** 
 @desc Action user.login
*/
	public function action_login()
	{
		
		// On vérifie si la personne est authentifiée
		// si c'est le cas c'est qu'elle est déjà connectée, donc on la renvoie vers son espace membre user
		if(Auth::check()){ return Redirect::to('user'); } 

		// Section::injecte() permet d'injecter des données dans la vue
		// ici on injecte un titre dans la vue, ce sera récupéré par blade avec @yield('titre')
		//Section::inject('titre', 'Mon blog | Login'); 

	/*
		// récupérer des données du modèle !!
		$posts = Post::all();

		return View::make('post.index')
		->with('posts',$posts);
	*/
		// récupération des données du formulaire
		// bien vérifier le fichier application/auth pour voir si c'est le username ou l'email qui sert d'identifiant
		if(Request::method()=="POST"){
			$userdata = array(
				'username'=>Input::get('username'),
				'password'=>Input::get('password')
				);
			// on vérifie si ce sont les bons identifiants
			if(Auth::attempt($userdata)){
				// si oui on connecte l'utilisateur
				return Redirect::to('user'); 
			}
			else{
				// sinon on génère une erreur
				return Redirect::to('user/login')
				->with_input()->with('login_errors',true);
			}
		}
		// on met un titre : MARCHE PAS car c'est mis trop tard (après le redirect !!)
		Section::inject('titre', 'Connexion');
		
		return View::make('user.login');

	}
/**
 @desc Action user.signup : voir Views/user/signup.blade.php
*/
	public function action_signup(){

		// On vérifie si la personne est authentifiée
		// si c'est le cas c'est qu'elle est déjà connectée, donc on la renvoie vers son espace membre user
		if(Auth::check()){ return Redirect::to('user'); } 

		// On vérifie qu'il y a bien une requete :
		// si le formulaire a bien été posté : on définit ci dessous les règles de validation
		if(Request::method()=='POST')
		{
			// Définition des règles de validation
			$rules = array(
				'username' => 'required|unique:users|between:3,20',
				'email' => 'required|email|unique:users',
				'password' => 'required|min:5|confirmed',
				'password_confirmation' => 'required'
				);

			// $validation = Validator::make($attributes, $rules, $messages);
			// on valide tous les champs postés DONT les fichiers : d'où le Input::all()
			$validation = Validator::make(Input::all(),$rules);

			// si la validation rate on renvoie sur le signup avec les erreurs en plus ! ;)
			if($validation->fails()){
				return Redirect::to('user/signup')->with_errors($validation)->with_input();
			}
			else
			{
			// Si SUCCES de la validation
				// on met les donnees dans la base
				$data = array(
					'username'=>Input::get('username'),
					'email'=>Input::get('email'),
					'password'=>Hash::make(Input::get('password'))
					);
				if(User::create($data))
				{
					Session::flash('success','inscription terminée');
				}
			}
			return Redirect::to('user/signup');
		}

		// on met un titre
		Section::inject('titre', 'Inscription'); 
		
		// On va à la vue contenant le formulaire d'inscription
		return View::make('user.signup');  // on renvoie à la vue d'inscription views/user/signup.blade.php

	}

/* Action user.logout 
slug est le pseudo du user
*/
	public function action_logout(){
	Auth::logout();
	//TODO : Ajouter un messsage : vous avez été déconnecté
	//Section::inject('message', 'Vous avez été déconnecté');
	return Redirect::home();
	}

}