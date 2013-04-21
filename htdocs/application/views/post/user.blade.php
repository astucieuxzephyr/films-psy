@layout('layouts.main')
@section('content')

{{-- ici il faudrait appliquer le css : comment on fait ? --}}
<!-- view posts du user -->
@if($user)
<h2>Articles de l'utilisateur {{$user->username}}</h2>
@foreach($user->posts as $p)

<h3><a href="{{URL::base().'/post/lire/'.Str::slug($p->title).'/'.$p->id}}">{{ $p->title }}</a></h3>
<div>par : <a href="{{URL::base().'/post/user/'.Str::slug($p->user->username).'/'.$p->user->id}}">{{ $p->user->username }}</a></div>
<p>{{ Str::limit($p->content, 200); }}</p>

@endforeach
@endif

@endsection
