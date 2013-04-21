@layout('layouts.main')
@section('content')
<!-- view lire post -->

@if($post)

<article>
<h1>{{ $post->title }}</h1>
<p>{{ $post->content }}</p>
{{-- Le lien /post/user/tanguy/1 permet de voir le user du post --}}
<div>par : <a href="{{URL::base().'/post/user/'.Str::slug($post->user->username).'/'.$post->user->id}}">{{ $post->user->username }}</a></div>

</article>
@unless(Auth::guest())

{{form::open('post/comment/'.$post->id,'POST',array('class'=>'well' )) }}
{{form::token()}}
{{form::textarea('comment',Input::old('comment'),array('placeholder'=>'Votre commentaire'))}}
<br/>
{{form::submit('Envoyer',array('class'=>'btn'))}}
{{form::close()}}

@else
   <p>Vous devez vous {{HTML::link('user/login','identifier')}} pour commenter cet article.</p>
@endunless
@endif
@endsection