@extends('layouts.app')

@section('content')
    <div id="home" class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        <p id="money" class="fa fa-2x fa-eur" aria-hidden="true"> {{ $user->money}}</p>
                        <p id="inventory" class="fa fa-2x fa-archive" aria-hidden="true"> {{ $user->inventory_size}}</p>

                        <!-- Donut ressouces -->
                        <div class="chart">
                            <center>
                                {!! $chart->html() !!}
                            </center>
                        </div>
                        <!-- End Of donut -->
                        {!! Charts::scripts() !!}
                        {!! $chart->script() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
