<?php
/* Controleur */
class Film_Controller extends Base_Controller {

/* CONSTRUCTEUR du Controleur de Film */
	function __construct(){
		parent::__construct(); // on commence par lancer le constructeur parent
		
		// FILTRES sur les actions : ces filtres permettent de limiter les actions
		// avant de charger cette action on verifie que la personne est authentifiee et on lie à la fonction index
		// les actions index et logout
		$this->filter('before','auth')->only(array('index','logout'));

		// filtre special avec gestion de tokens pour la securité
		/*
		Voir le fichier route.php pour consulter les redirections si le filtre est bloquant.
		*/
		$this->filter('before','csrf')->on('film');
	}

/**
Action film.index
*/
	public function action_index()
	{
		// Section::injecte() permet d'injecter des données dans la vue
		// ici on injecte un titre dans la vue, ce sera récupéré par blade avec @yield('titre')
		Section::inject('titre', 'Films | Accueil'); 

		/* variables à passer à la Vue via la commande with */
		// $titre = "Un super titre" ;
		
		/* binding data to a view : relier des données à une vue */
		/* la vue se trouve dans views/film/index.php */

		// récupérer des données du modèle !!
		$films = Film::all();

		return View::make('film.index')
		->with('films',$films);

	}

/**
Action film.lire
*/
	public function action_lire($slug,$id_film){
		// on récupère le film correspondant à ce qui est demandé
		$film = Film::find($id_film);
		// titre
		Section::inject('titre', $film->titre.' | Film de '.$film->realisateur);
		// on renvoie la vue avec ce film
		return View::make('film.lire')
		->with('film',$film); // un seul film transmis
	}

/* Action film.add : pour ajouter un film
cela sera possible seulement pour un utilisateur authentifié
sinon on est redirigé. Où ? aller voir le fichier routes */
	public function action_add(){
		return View::make('film.add');
	}

/**
Action film.user
*/
/*
	public function action_user($slug,$id_user){
		$user= User::find($id_user);
		Section::inject('title', 'Articles de '.$film->user->username);
		return View::make('film.user')
		->with('user',$user);
	}
*/
}