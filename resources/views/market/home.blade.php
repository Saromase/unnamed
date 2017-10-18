@extends('layouts.app')
@section('test')
    <nav id="navbar-vertical">
        <ul class="nav navbar">
            <li><a href="{{ route('marketTierOne') }}"><i class="fa fa-chevron-right" aria-hidden="true"></i> Tier 1 </a></li>
            <li><a href="{{ route('marketTierTwo') }}"><i class="fa fa-chevron-right" aria-hidden="true"></i> Tier 2</a></li>
        </ul>
        <button id="reduce" type="button">
            <i class="fa fa-minus" aria-hidden="true"></i>
            <i class="fa fa-plus" aria-hidden="true"></i>
        </button>
    </nav>
@endsection
@section('content')
    <div id="admin" class="main">
        <div class="jumbottron">
            <h1>Bienvenue {{ $user->name }} !</h1>
            <p> Moi je suis le grossiste, Ici vous trouverez votre bonheur ! Attention, ici on ne négocie pas !</p>
        </div>
    </div>
@endsection
