{{-- usa o layout master --}}
@extends('layouts.fo')

@section('content')
    <h1 class="my-4">Viagens de Natal</h1>

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
                    <td>{{ $trip->photo }}</td>
                    <td>{{ $trip->stops_count }}</td>
                    <td>
                        <a href="{{ route('stops.trip', $trip->id) }}" class="btn btn-success">Ver paragens</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection