@extends('layouts.app') @section('content')
<nav class="navbar-vertical">
    <ul class="nav navbar">
        <li><a href="admin/products"><i class="fa fa-chevron-right" aria-hidden="true"></i> Produits</a></li>
        <li><a href="#"><i class="fa fa-chevron-right" aria-hidden="true"></i> Utilisateurs</a></li>
        <li><a href="#"><i class="fa fa-chevron-right" aria-hidden="true"></i> Inventaires</a></li>
    </ul>
    <button id="reduce" type="button">
      <i class="fa fa-minus" aria-hidden="true"></i>
      <i class="fa fa-plus" aria-hidden="true"></i>
    </button>
</nav>

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
    <div class="alert" id="alert" style="display: none;">
        {{-- Ajax use --}}
    </div>

    <div class="jumbottron">
      <h1>Administrations</h1>
      <p>Du texte en vrac <span>et un span</span>.</p>

      <!-- Option -->
      <div class="options">
        <button type="button" class="btn btn-primary" id="refreshProductsPrice">Raffraichir</button>
      </div>
    </div>

    <!-- Tableau des items-->
    <div class="items">
        <table class="table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Quantité</th>
                    <th>Quantité %</th>
                    <th>Prix Médian</th>
                    <th>Prix</th>
                    <th>Demande</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->percentage }}</td>
                        <td>{{ $product->median_price }}</td>
                        <td id="{{$product->name}}Price">{{ $product->price }}</td>
                        @if ($product->supply_demand > 0) <td class="success" id="{{$product->name}}Demand">
                        @else <td class="danger" id="{{$product->name}}Demand">
                        @endif {{ $product->supply_demand }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

@endsection
