<?php
/* Controleur */
class Contact_Controller extends Base_Controller {

/* Action film.index */
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

}