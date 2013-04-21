@layout('layouts.main')
@section('content')
<!-- view liste posts -->

@if($posts)
@foreach($posts as $p)
{{-- Le lien /post/lire/titre-du-post/id_post permet de voir un post --}}
<h1><a class="titlepost" href="{{URL::base().'/post/lire/'.Str::slug($p->title).'/'.$p->id}}">{{ $p->title }}</a></h1>
{{-- Le lien /post/user/tanguy/1 permet de voir un user --}}
<div>par : <a href="{{URL::base().'/post/user/'.Str::slug($p->user->username).'/'.$p->user->id}}">{{ $p->user->username }}</a></div>
<p>{{ Str::limit($p->content, 200); }}</p>

@endforeach
@endif
@endsection
