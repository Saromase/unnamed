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
                        <th>Level</th>
                        <th>Prix</th>
                        <th>Acheter</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($userFactoryDatas as $userFactory)
                        <tr>
                            <td>{{ $userFactory['name'] }}</td>
                            <td>{{ $userFactory['level'] }}</td>
                            <td>{{ $userFactory['price'] }}</td>
                            <td><button onclick="">Acheter</button></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
