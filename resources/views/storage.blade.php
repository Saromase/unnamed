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
                      @foreach($productsList as $product)
                            @foreach($inventory as $item)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $item->{$product->name} }}</td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>


    </div>
@endsection
