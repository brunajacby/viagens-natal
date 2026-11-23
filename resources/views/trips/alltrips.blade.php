@extends('layouts.fo')

@section('content')
    <h1 class="my-4">Viagens de Natal</h1>

    {{-- mensagem de sucesso --}}
    @if (session('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @endif

    {{-- só o admin adiciona --}}
    @auth
        @if (Auth::user()->user_type == 1)
            <a href="{{ route('trips.add') }}" class="btn btn-success mb-3">Adicionar viagem</a>
        @endif
    @endauth

    {{-- tabela das viagens --}}
    <table class="table align-middle">
        <thead>
            <tr>
                <th scope="col">Destino</th>
                <th scope="col" class="text-center">Foto</th>
                <th scope="col" class="text-center">Nº de paragens</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            {{-- uma linha por cada viagem --}}
            @foreach ($trips as $trip)
                <tr>
                    <td>{{ $trip->destination }}</td>
                    <td class="text-center"><img class="trip-photo" src="{{ $trip->photo ? asset('storage/' . $trip->photo) : asset('images/nophoto.jpg') }}" alt="">
                    </td>
                    <td class="text-center">{{ $trip->stops_count }}</td>
                    <td>
                        <a href="{{ route('stops.trip', $trip->id) }}" class="btn btn-success">Ver paragens</a>

                        {{-- editar com login, apagar só admin --}}
                        @auth
                            <a href="{{ route('trips.edit', $trip->id) }}" class="btn btn-outline-success">Editar</a>

                            @if (Auth::user()->user_type == 1)
                                <a href="{{ route('trips.delete', $trip->id) }}" class="btn btn-outline-danger" onclick="return confirm('Tem a certeza que quer apagar esta viagem?')">Apagar</a>
                            @endif
                        @endauth
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection