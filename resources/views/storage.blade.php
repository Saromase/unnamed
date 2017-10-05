@extends('layouts.app')

@section('content')
<div class="container">
    @foreach($storage as $local)@endforeach
        <h1>Bienvenue dans votre {{ $local->name }}</h1>
        <p>{{ $local->length  }}</p>
    
</div>
@endsection
