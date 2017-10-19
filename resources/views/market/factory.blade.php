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
                    </tr>
                </thead>
                <tbody>
                    @foreach($factorys as $factory)
                        <tr>
                            <td>{{ $factory->name }}</td>
                            <td id="{{$factory->name}}Price">{{ $factory->price }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
