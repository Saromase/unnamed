@extends('layouts.admin')

@section('content')
    <div id="admin" class="main">
        <div class="jumbottron">
            <h1>Bienvenue {{ $user->name }}</h1>
            <p>Compte créé le <span>{{ $user->create_at }}</span>.</p>
        </div>
    </div>
@endsection
