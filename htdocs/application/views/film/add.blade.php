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
{{ Form::text('synopsis',Input::old('synopsis'),array('input'=>'input-xlarge','placeholder'=>'Synopsis du film')) }}
{{ $errors->first('synopsis','<span class="error">::message</span>'); }}


{{-- bouton --}}
{{ Form::submit('Enregistrer',array('class'=>'btn')) }}




{{ Form::close() }}
@endsection