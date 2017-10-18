@extends('layouts.admin')

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
        <div class="alert" id="alert" style="display: none;">
            {{-- Ajax use --}}
        </div>

        <div class="jumbottron">
          <h1>Utilisateurs</h1>
          <p>Dernier utilisateur enregistré <span>{{ $lastUserName }}</span>.</p>

          <!-- Option -->
          <div class="options">
            <button type="button" class="btn btn-primary">Bannir 1h</button>
            <button type="button" class="btn btn-primary">Bannir 4h</button>
            <button type="button" class="btn btn-primary">Bannir 12h</button>
            <button type="button" class="btn btn-primary">Bannir 48h</button>
            <button type="button" class="btn btn-primary">Bannir définitivement</button>
          </div>
        </div>

        <!-- Tableau des items-->
        <div class="items">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>E-mail</th>
                        <th>Création du compte le</th>
                        <th>Argent</th>
                        <th>Taille de l'inventaire</th>
                        <th>Id de stockage</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td>{{ $user->money }}</td>
                            <td>{{ $user->inventory_size }}</td>
                            <td>{{ $user->storage_id }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
