@layout('layouts.main')
@section('content')
{{-- signup.blade.php --}}


@if(Session::has('success'))
	<div class="alert alert-success">{{ Session::get('success') }}</div>
@endif

{{-- ci dessous la classe well correspond au style du bootstrap --}}
{{ Form::open('user/signup', 'POST', array('class'=>'well')) }}

{{-- ajoute un token : jeton de sécurité csrf pour éviter le renvoi --}}
{{ Form::token() }}

{{-- formulaire --}}
{{-- les vérifications se font dans le controler --}}

{{ Form::text('username',Input::old('username'),array('class'=>'input-xlarge','placeholder'=>'votre pseudo')) }}
{{ $errors->first('username','<span class="error">::message</span>'); }}
<br/>
{{ Form::email('email',Input::old('email'),array('class'=>'input-xlarge','placeholder'=>'votre email')) }}
{{ $errors->first('email','<span class="error">::message</span>'); }}
<br/>
{{ Form::password('password',array('class'=>'input-xlarge','placeholder'=>'votre Mot de passe')) }}
{{ $errors->first('password','<span class="error">::message</span>'); }}
<br/>
{{ Form::password('password_confirmation',array('class'=>'input-xlarge','placeholder'=>'Récrivez le Mot de passe')) }}
{{ $errors->first('password_confirmation','<span class="error">::message</span>'); }}


{{-- bouton --}}
{{ Form::submit('S\'inscrire',array('class'=>'btn')) }}




{{ Form::close() }}
@endsection