@layout('layouts.main')
@section('content')
<!-- view user -->
<h3>Espace utilisateur</h3>

@if($user)

<p>Bienvenue dans votre espace, {{ $user->name }} !</p>

@endif

@endsection
