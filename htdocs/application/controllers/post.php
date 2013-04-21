<?php
/* DUPLICATA */
class Post_Controller extends Base_Controller {

/* CONSTRUCTEUR du Controleur de Post */
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
		$this->filter('before','csrf')->on('post');
	}

/**
Action post.index 
*/
	public function action_index()
	{
		// Section::injecte() permet d'injecter des données dans la vue
		// ici on injecte un titre dans la vue, ce sera récupéré par blade avec @yield('titre')
		Section::inject('titre', 'Mon blog | Accueil'); 

		// récupérer des données du modèle !!
		$posts = Post::all();

		return View::make('post.index')
		->with('posts',$posts);

	}
/**
@desc Action post.lire
@comment Deux paramètres
*/
	public function action_lire($slug,$id_article){
		$post = Post::find($id_article);

		Section::inject('title', $post->title.' | Article de'.$post->user->username);
		return View::make('post.lire')->with('post',$post); // un seul post est transmis en paramètre à la vue
	}

/**
Action post.user : ici slug est le pseudo du user
*/
	public function action_user($user_login,$id_user){
		$user = User::find($id_user);
		Section::inject('title', 'Articles de '.$user->username);
		return View::make('post.user')->with('user',$user); // cf view/post/user.blade.php
	}

/**
Action post.comment : pour ajouter un comment ???
*/
	public function action_comment($slug,$id_comment){

	}

/* Action post.add : pour ajouter un article
cela sera possible seulement pour un utilisateur authentifié
sinon on est redirigé. Où ? aller voir le fichier routes */
	public function action_add(){
		return View::make('post.add');
	}

}