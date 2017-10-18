@extends('layouts.app')
@section('test')
    <nav id="navbar-vertical">
        <ul class="nav navbar">
            <li><a href="{{ route('marketTierOne') }}"><i class="fa fa-chevron-right" aria-hidden="true"></i> Tier 1 </a></li>
            <li><a href="{{ route('marketTierTwo') }}"><i class="fa fa-chevron-right" aria-hidden="true"></i> Tier 2</a></li>
            <li><a href="{{ route('marketFactory') }}"><i class="fa fa-chevron-right" aria-hidden="true"></i> Factory</a></li>
        </ul>
        <button id="reduce" type="button">
            <i class="fa fa-minus" aria-hidden="true"></i>
            <i class="fa fa-plus" aria-hidden="true"></i>
        </button>
    </nav>
@endsection
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
