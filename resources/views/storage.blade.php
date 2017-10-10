@extends('layouts.app') @section('content')
<div id="storage" class="container">
    <h1 class="<text-center></text-center>">Bienvenue dans votre {{ $storage->name }}</h1>

    <div class="test">
        <h2 class="text-center">{{ $storage->name }}</h2>
        <h3 class="text-center"> Taille du stockage : {{ $storage->length }}</h3>
        <!--@foreach ($inventory as $product)
        <div>
            <h1>{{$product->name}}</h1>
        </div>
        @endforeach-->
    </div>


</div>
@endsection
