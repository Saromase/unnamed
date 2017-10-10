@extends('layouts.app') @section('content')
<div id="storage" class="container">
    @foreach($storage as $local)@endforeach
    <h1 class="<text-center></text-center>">Bienvenue dans votre {{ $local->name }}</h1>

    <div class="test">
        <h2 class="text-center">{{ $local->name }}</h2>
        <h3 class="text-center"> Taille du stockage : {{ $local->length }}</h3>
        @for($i = 0; $i < count($productsName); $i++)
            <div>
                <h2>{{ $productsName[$i]->name }}</h2>
                <p>{{ $productsNumber[$i] }}</p>
            </div>
        @endfor
    </div>


</div>
@endsection
