@layout('layouts.main')
@section('content')
<!-- view film -->

@if($films)
@foreach($films as $f)

<h4><a href="{{URL::base().'/film/lire/'.Str::slug($f->titre).'/'.$f->id}}">{{ $f->titre }}</a></h4>
<div>Type : {{ $f->type }} &nbsp;&nbsp;Durée : {{ $f->duree }} &nbsp;&nbsp;Année : {{ $f->annee_production }}<div>
<div>Par : {{ $f->realisateur }} &nbsp;&nbsp;Avec : {{ $f->acteurs }} </div>
<div>Thème(s) : {{ $f->theme }} Tag_psy : {{ $f->tags_psy }}</div>
<div class="filmdesc" style="background-color:#e2e5f2; padding:10px; font-size:11px;"><p>{{ Str::limit($f->synopsis, 250); }}</p></div>

@endforeach
@endif
@endsection
