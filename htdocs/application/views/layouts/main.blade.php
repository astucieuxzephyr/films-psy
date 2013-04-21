
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title> @yield('titre') </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- styles -->
    {{HTML::style('css/bootstrap.css')}}
    {{HTML::style('css/custom.css')}}
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
    <link href="../assets/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
      <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
      <link rel="shortcut icon" href="../assets/ico/favicon.png">
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          {{HTML::link('/','PsychoFilms',array('class'=>'brand'))}}

          <div class="nav-collapse collapse">
            <ul class="nav">
          {{-- Liens toujours existants (hors condition de login) --}}
              <li>{{HTML::link('/film','Films')}}</li>
          @if(Auth::guest())
          {{-- Liens si la personne n est pas logguee --}}
              <li>{{HTML::link('/user/login','Login')}}</li>
              <li>{{HTML::link('/user/signup','Inscription')}}</li>
          @else
          {{-- Liens si la personne est logguee --}}
              <li>{{HTML::link('/post/add','Ecrire un article')}}</li>
              <li>{{HTML::link('/film/add','Ajouter un film')}}</li>
              <li class="connected">{{HTML::link('/user','Vous êtes '.Auth::user()->username)}}</li>
              <li class="connected">{{HTML::link('/user/logout','[Logout]')}}</li>
          @endif
          {{-- Liens toujours existants (hors condition de login) --}}
              <li>{{HTML::link('/contact','Contact')}}</li>              
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">
    @yield('content')
    </div> <!-- /container -->

    {{HTML::script('js/bootstrap.js')}}
  </body>
</html>
