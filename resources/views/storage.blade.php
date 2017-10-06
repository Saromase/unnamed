@extends('layouts.app') @section('content')
<div id="storage" class="container">
    @foreach($storage as $local)@endforeach
    <h1 class="<text-center></text-center>">Bienvenue dans votre {{ $local->name }}</h1>
    <!-- <div class="main">
        <img src="/img/storage/room.jpg" alt="Room" class="img-responsive">
    </div> -->
    <div class="test">
        <h2 class="text-center">{{ $local->name  }}</h2>
        <h3 class="text-center"> Taille du stockage : {{ $local->length  }}</h3>
        
    </div>

</div>
@endsection
