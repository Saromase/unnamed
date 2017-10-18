@extends('layouts.app')
@section('test')
    <nav class="navbar-vertical">
        <ul class="nav navbar">
            <li><a href="{{ route('market') }}"><i class="fa fa-chevron-right" aria-hidden="true"></i> Tier 1 </a></li>
            <li><a href="{{ route('market') }}"><i class="fa fa-chevron-right" aria-hidden="true"></i> Tier 2</a></li>
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
                        <th>Prix</th>
                        <th>Acheter</th>
                        <th>Achat Max</th>
                        <th>Vendre</th>
                        <th>Tout Vendre</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td id="{{$product->name}}Price">{{ $product->price }}</td>
                            <td>
                                <form action='/market/buy/{{$product->id}}' method="get">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-default">Acheter une unité</button>
                                </form>
                            </td>
                            <td>
                              <form action='/market/sell/{{$product->id}}' method="get">
                                  {{ csrf_field() }}
                                  <button type="submit" class="btn btn-default">Vendre une unité</button>
                              </form>
                            </td>
                            <td>
                              <form action='/market/buy/all/{{$product->id}}}' method="get">
                                  {{ csrf_field() }}
                                  <button type="submit" class="btn btn-default">Tout acheter</button>
                                  </form>
                            </td>
                            <td>
                              <form action='/market/sell/all/{{$product->id}}}' method="get">
                                  {{ csrf_field() }}
                                  <button type="submit" class="btn btn-default">Tout vendre</button>
                              </form>
                            </td>


                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
