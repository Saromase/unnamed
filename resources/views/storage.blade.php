@extends('layouts.app') @section('content')
<div id="storage" class="container">
    @foreach($storage as $local)@endforeach
    @foreach($tutu as $inventory)@endforeach
    <h1 class="<text-center></text-center>">Bienvenue dans votre {{ $local->name }}</h1>
    <!-- <div class="main">
        <img src="/img/storage/room.jpg" alt="Room" class="img-responsive">
    </div> -->
    <div class="test">
        <h2 class="text-center">{{ $local->name  }}</h2>
        <h3 class="text-center"> Taille du stockage : {{ $local->length  }}</h3>
        <div>
                <h2>Eau</h2>
                <p>{{ $inventory->water }}</p>
        </div>
        <div>
                <h2>Pierre</h2>
                <p>{{ $inventory->rock }}</p>
        </div>
        <div>
                <h2>Gaz Naturel</h2>
                <p>{{ $inventory->natural_gas }}</p>
        </div>
        <div>
                <h2>Petrole Brut</h2>
                <p>{{ $inventory->crud_oil }}</p>
        </div>
        <div>
                <h2>Aluminium</h2>
                <p>{{ $inventory->aluminium }}</p>
        </div>
        <div>
                <h2>Or</h2>
                <p>{{ $inventory->gold }}</p>
        </div>
        <div>
                <h2>Fer</h2>
                <p>{{ $inventory->iron }}</p>
        </div>
        <div>
                <h2>Cuivre</h2>
                <p>{{ $inventory->copper }}</p>
        </div>
        <div>
                <h2>Sable</h2>
                <p>{{ $inventory->sand }}</p>
        </div>
        <div>
                <h2>Charbon de bois</h2>
                <p>{{ $inventory->charcoal }}</p>
        </div>
        <div>
                <h2>Bois</h2>
                <p>{{ $inventory->wood }}</p>
        </div>
    </div>
    

</div>
@endsection
