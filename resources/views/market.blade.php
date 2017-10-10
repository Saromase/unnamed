@extends('layouts.app')

@section('content')
<div id="storage" class="container">
    <div class="test">
        @foreach($products as $product)
           <div class="product">
               <div class="product-picture"></div>
                <h3>{{ $product->name }}</h3>
                <p>{{ $product->price }} €</p>
           </div>
        @endforeach
    </div>
</div>
@endsection
