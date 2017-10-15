@extends('layouts.app') @section('content')
<div class="container">
    <!-- Error -->
    <div class="row">
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
    </div>

    <div class="panel-group" id="accordion">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Produit</a>
                </h4>
            </div>
            <div id="collapse1" class="panel-collapse collapse in">
                <div class="panel-body">
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
                                    <td>{{ $product->price }}</td>
                                    @if ($product->supply_demand > 0)
                                    <td class="success">{{ $product->supply_demand }}</td>
                                    @else
                                    <td class="danger">{{ $product->supply_demand }}</td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- Option -->
                    
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
