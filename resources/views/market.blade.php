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

    <div id="market" class="container main">
        <h1>Bienvenue au marché</h1>
        <div class="row flex-container">
            @foreach($products as $product)
                <div class="flex-item">
                    <div class="product-picture"></div>
                    <h3>{{ $product->name }}</h3>
                    <p>{{ $product->price }} €</p>
                    <form action='/market/buy/{{$product->id}}' method="get">
                        {{ csrf_field() }}
                        <button type="submit">Acheter une unité</button>
                    </form>
                    <form action='/market/sell/{{$product->id}}' method="get">
                        {{ csrf_field() }}
                        <button type="submit">Vendre une unité</button>
                    </form>
                    <form action='/market/sell/all/{{$product->id}}}' method="get">
                        {{ csrf_field() }}
                        <button type="submit">Tout vendre</button>
                    </form>
                    <form action='/market/buy/all/{{$product->id}}}' method="get">
                        {{ csrf_field() }}
                        <button type="submit">Tout acheter</button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
@endsection
