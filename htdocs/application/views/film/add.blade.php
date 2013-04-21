@layout('layouts.main')
@section('content')
{{-- add.blade.php --}}

{{-- ci dessous la classe well correspond au style du bootstrap --}}
{{ Form::open('film/add', 'POST', array('class'=>'well')) }}

{{-- ajoute un token : jeton de sécurité csrf pour éviter le renvoi --}}
{{ Form::token() }}

{{-- formulaire --}}
{{-- les vérifications se font dans le controler --}}

{{ Form::text('titre',Input::old('titre'),array('input'=>'input-xlarge','placeholder'=>'Titre du film')) }}
{{ $errors->first('titre','<span class="error">::message</span>'); }}
<br/>
{{ Form::text('realisateur',Input::old('realisateur'),array('input'=>'input-xlarge','placeholder'=>'Nom du réalisateur')) }}
{{ $errors->first('realisateur','<span class="error">::message</span>'); }}
<br/>
{{ Form::text('acteurs',Input::old('acteurs'),array('input'=>'input-xlarge','placeholder'=>'Nom des acteurs principaux')) }}
{{ $errors->first('acteurs','<span class="error">::message</span>'); }}
<br/>
{{ Form::text('type',Input::old('type'),array('input'=>'input-xlarge','placeholder'=>'Type (documentaire,fiction, drame, comédie, horreur)')) }}
{{ $errors->first('type','<span class="error">::message</span>'); }}
<br/>
{{ Form::text('duree',Input::old('duree'),array('input'=>'input-xlarge','placeholder'=>'Durée')) }}
{{ $errors->first('duree','<span class="error">::message</span>'); }}
<br/>
{{ Form::text('annee',Input::old('annee'),array('input'=>'input-xlarge','placeholder'=>'Année')) }}
{{ $errors->first('annee','<span class="error">::message</span>'); }}
<br/>
{{ Form::text('synopsis',Input::old('synopsis'),array('input'=>'input-xlarge','placeholder'=>'Synopsis du film')) }}
{{ $errors->first('synopsis','<span class="error">::message</span>'); }}
<br/>

{{-- bouton --}}
{{ Form::submit('Enregistrer',array('class'=>'btn')) }}

{{ Form::close() }}
@endsection