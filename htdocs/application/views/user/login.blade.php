@layout('layouts.main')
@section('content')
{{-- login.blade.php --}}

@if(Session::has('login_errors'))
<div class="alert alert-error">Mauvais identifiant ou mot de passe !</div>
@endif

<h3>Connexion</h3>
{{-- ci dessous la classe well correspond au style du bootstrap --}}
{{ Form::open('user/login', 'POST', array('class'=>'well form-inline')) }}

{{-- ajoute un token : jeton de sécurité csrf pour éviter le renvoi --}}
{{ Form::token() }}

{{-- formulaire --}}
{{-- les vérifications se font dans le controler --}}

{{ Form::text('username',Input::old('username'),array('class'=>'input-large','placeholder'=>'Votre email')) }}
{{ $errors->first('username','<span class="error">::message</span>'); }}
<br/>
{{ Form::password('password',array('class'=>'input-large','placeholder'=>'Votre mot de passe')) }}
{{ $errors->first('password','<span class="error">::message</span>'); }}
<br/>


{{-- bouton --}}
{{ Form::submit('Se connecter',array('class'=>'btn')) }}

{{ Form::close() }}
@endsection