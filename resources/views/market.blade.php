@extends('layouts.app')

@section('content')
@isset ($success)
<div class="alert alert-success">
  {{ $success}}
</div>
@endisset
@isset ($faillure)
<div class="alert alert-danger">
  {{ $faillure}}
</div>
@endisset

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
            </div>
        @endforeach
    </div>
</div>
@endsection
