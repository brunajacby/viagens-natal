@extends('layouts.fo')

@section('content')
    <h1 class="my-4">Viagens de Natal</h1>

    {{-- mensagem de sucesso --}}
    @if (session('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @endif

    <a href="{{ route('trips.add') }}" class="btn btn-success mb-3">Adicionar viagem</a>

    {{-- tabela das viagens --}}
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Destino</th>
                <th scope="col">Foto</th>
                <th scope="col">Nº de paragens</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            {{-- uma linha por cada viagem --}}
            @foreach ($trips as $trip)
                <tr>
                    <td>{{ $trip->destination }}</td>
                    <td><img class="trip-photo" src="{{ $trip->photo ? asset('storage/' . $trip->photo) : asset('images/nophoto.jpg') }}" alt="">
                    </td>
                    <td>{{ $trip->stops_count }}</td>
                    <td>
                        <a href="{{ route('stops.trip', $trip->id) }}" class="btn btn-success">Ver paragens</a>
                        <a href="{{ route('trips.edit', $trip->id) }}" class="btn btn-outline-success">Editar</a>
                        <a href="{{ route('trips.delete', $trip->id) }}" class="btn btn-outline-danger">Apagar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection