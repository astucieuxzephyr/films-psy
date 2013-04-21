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



{{-- bouton --}}
{{ Form::submit('Enregistrer',array('class'=>'btn')) }}




{{ Form::close() }}
@endsection