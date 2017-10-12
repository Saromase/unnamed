@extends('layouts.app')
@section('content')
    <div id="storage" class="container main">
        <h1>Bienvenue dans votre {{ $storage->name }}</h1>

        <div class="row">

            <h2 class="text-center">{{ $storage->name }}</h2>
            <h3 class="text-center"> Taille du stockage : {{ $storage->length }}</h3>

            <div>
                <table class="table">
                    <thead>
                        <th>Nom</th>
                        <th>Nombre</th>
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

    @isset ($warning)
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Une erreur c'est produite !</h4>
                </div>
                <div class="modal-body">
                    <p>{{ $warning }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                </div>
            </div>

        </div>
    </div>
    @endisset
@endsection
