@extends('layouts.market')
@section('content')
    <div id="admin" class="main">
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
        <div class="items">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prix</th>
                        <th>Acheter</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($factorys as $factory)
                        <tr>
                            <td>{{ $factory->name }}</td>
                            <td>{{ $price }}</td>
                            <td><button type="button" id="factory{{ $factory->id }}" >Acheter</button></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
