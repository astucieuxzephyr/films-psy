@layout('layouts.main')
@section('content')
<!-- view lire film -->

@if($film)

<article>


<h3>{{ $film->titre }}</h3>

<div style="background-color:#e2e5f2; padding:10px; border:1px solid grey;">
<div>English Title : {{ $film->titre_ENG }}</div>
<div>Réalisateur : <a hrefilm="{{URL::base().'/personne/lire/'.Str::slug($film->realisateur)}}">{{ $film->realisateur }}</a></div>
<div>Acteurs : {{ $film->acteurs }} </div>
<div>Type : {{ $film->type }} </div>
<div>Durée : {{ $film->duree }} </div>
<div>Année : {{ $film->annee_production }}<div>
<div>Thème(s) : {{ $film->theme }}</div>
<div>Tag_psy : {{ $film->tags_psy }}</div>
</div>
@if($film->synopsis)
<div style="background-color:#f6e7fb; padding:10px; border:0px solid grey;"><p><b>Synopsis :</b><br/>{{ $film->synopsis }}</p></div>
@else
<div>Pas de Synopsis</div>
@endif

</article>
@unless(Auth::guest())

{{Form::open('film/comment/'.$film->id,'POST',array('class'=>'well' )) }}
{{Form::token()}}
{{Form::textarea('comment',Input::old('comment'),array('placeholder'=>'Votre commentaire'))}}
<br/>
{{Form::submit('Envoyer',array('class'=>'btn'))}}
{{Form::close()}}

@else
   <p>Vous devez vous {{HTML::link('user/login','identifier')}} pour commenter ce film.</p>
@endunless



@endif
@endsection