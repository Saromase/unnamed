@extends('layouts.app')

@section('content')
<div id="storage" class="container">
    <div class="test">
            @foreach($products as $product)
            <h2>{{ $product->name }}</h2>
            <p>{{ $product->price }}</p>
        @endforeach
    </div>
</div>
@endsection
