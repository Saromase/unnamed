@extends('layouts.app') @section('content')
<div id="storage" class="container main">
    @foreach($storage as $local)@endforeach
    <h1 class="<text-center></text-center>">Bienvenue dans votre {{ $local->name }}</h1>

    <div class="row">
        <h2 class="text-center">{{ $local->name }}</h2>
        <h3 class="text-center"> Taille du stockage : {{ $local->length }}</h3>
        <div>
            <table class="table">
                <thead>
                    <th>Nom</th>
                    <th>Nombre</th>
                </thead>
                <tbody>
                    @for($i = 0; $i < count($productsName); $i++)
                        <tr>
                            <td>{{ $productsName[$i]->name }}</td>
                            <td>{{ $productsNumber[$i] }}</td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>
    </div>


</div>
@endsection
