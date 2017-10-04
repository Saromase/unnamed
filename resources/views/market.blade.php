@extends('layouts.app')

@section('content')
<div class="container">
    @foreach($products as $product)
        <h1>{{ $product->name }}</h1>
        <p>{{ $product->price }}</p>
    @endforeach
</div>
@endsection
