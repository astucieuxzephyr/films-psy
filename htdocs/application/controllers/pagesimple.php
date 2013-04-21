<?php
/* DUPLICATA */
class PageSimple_Controller extends Base_Controller {

/* Action post.index */
	public function action_index()
	{
		/* variables à passer à la Vue */
		$titre = "Un super titre" ;
		$content = "Un contenu de page simple";
		
		// cf. http://laravel.com/docs/views
		/* binding data to a view : relier des données à une vue */
		/* la vue se trouve dans views/post/index.php */
		// return View::make('post.index');

			return View::make('pagesimple.index')
			//->with('titre',$titre)
			//->with('content',$content);

			/* On aurait aussi pu passer un tableau de données */
			// View::make('home', array('name' => 'James'));

			// récupérer des données du modèle !!
			
	}




}