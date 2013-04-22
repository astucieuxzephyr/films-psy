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

/**
@desc Action film.add : pour ajouter un film
voir Views/film/add.blade.php
cela sera possible seulement pour un utilisateur authentifié
sinon on est redirigé. Où ? aller voir le fichier routes
*/
/*
			$table->string('annee_production');
			$table->text('synopsis'); // petit synopsis
			$table->string('theme'); // theme : amour, guerre
			$table->string('tags_psy');
			$table->string('lien_defaut');
			$table->string('lien_allocine');
*/
	public function action_add(){

		// On vérifie si la personne est authentifiée
		// si c'est le cas c'est qu'elle est déjà connectée, donc on la renvoie vers son espace membre user
		if(Auth::check()){  

			// On vérifie qu'il y a bien une requete :
			// si le formulaire a bien été posté : on définit ci dessous les règles de validation
			if(Request::method()=='POST')
			{
				// Définition des règles de validation
				$rules = array(
					'titre' => 'required|min:2',
					// 'titre_FR' => 'required',
					'realisateur' => 'required|min:4',
					// 'synopsis' => 'required'
					);

				// $validation = Validator::make($attributes, $rules, $messages);
				// on valide tous les champs postés DONT les fichiers : d'où le Input::all()
				$validation = Validator::make(Input::all(),$rules);

				// si la validation rate on renvoie sur le meme formulaire avec les erreurs en plus ! ;)
				if($validation->fails()){
					return Redirect::to('film/add')->with_errors($validation)->with_input();
				}
				else
				{
				// Si SUCCES de la validation
					// on met les donnees dans la base
					$data = array(
						// 'nom_champ'=>Input::get('nom_champ'),
						'titre'=>Input::get('titre'),
						'titre_FR'=>Input::get('titre_FR'),
						'titre_ENG'=>Input::get('titre_ENG'),
						'realisateur'=>Input::get('realisateur'),
						'acteurs'=>Input::get('acteurs'),
						'type'=>Input::get('type'),
						'duree'=>Input::get('duree'),
						'annee'=>Input::get('annee_production'),
						'synopsis'=>Input::get('synopsis','Synopsis à compléter'),
						);
					if(Film::create($data))
					{
						Session::flash('success','Ajout du film correctement effectué');
					}
				}
				return Redirect::to('film/add'); // On relance le meme formulaire pour pouvoir entrer un autre film
			}

			// on met un titre
			Section::inject('titre', 'Ajout d\'un film'); 
			// On va à la vue contenant le formulaire d'ajout
			return View::make('film.add');  // on renvoie à la vue d'inscription views/user/signup.blade.php
		
		} 
		else 
		{
		// return View::make('ERREUR vous devez etre connecte pour ajouter un film');
		// l'URL Base de l'application redirige vers le controleur Film
		return Redirect::to('film');
		}
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