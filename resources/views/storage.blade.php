@extends('layouts.app')
@section('content')

    <!-- Error -->
    @if (session('warning'))
        <div class="alert alert-danger">
            {{ session('warning') }}
        </div>
    @endif


    <!-- Success -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div id="storage" class="container main">
        <h1>Bienvenue dans votre {{ $storage->name }}</h1>

        <div class="row">
            <h2 class="text-center">{{ $storage->name }}</h2>
            <h3 class="text-center"> Taille du stockage : {{ $storage->length }}</h3>

            <!-- Button upgrade storage -->
            @isset($upgradePrice)
                <button class="btn btn-info" type="button" data-toggle="modal" data-target="#storageUpgrade">Plus d'espace ?</button>
           


            <!-- Modal -->
            <div class="modal fade" id="storageUpgrade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Voulez-vous agrandir votre {{ $storage->name }} ?</h4>
                        </div>
                        <div class="modal-body">
                            <p>Votre argent : {{ $playerMoney }}</p>
                            <p>Prix : {{ $upgradePrice }}</p>
                            <form action="/storage/storageUpgrade" method="get">
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-default">Accepter</button>
                            </form>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                        </div>
                    </div>

                </div>
            </div>
             @endisset

            <!-- List items -->
            <div>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Nombre</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($inventory as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->quantity }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>

    </div>

@endsection
