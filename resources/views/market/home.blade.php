@extends('layouts.market')
@section('content')
    <div id="admin" class="main">
        <div class="jumbottron">
            <h1>Bienvenue {{ $user->name }} !</h1>
            <p> Moi je suis le grossiste, Ici vous trouverez votre bonheur ! Attention, ici on ne négocie pas !</p>
        </div>
    </div>
@endsection
