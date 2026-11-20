@extends('layouts.fo')

@section('content')
    <h1 class="my-4">{{ $trip->destination }}</h1>

    {{-- mensagem de sucesso --}}
    @if (session('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @endif

    <a href="{{ route('stops.add', $trip->id) }}" class="btn btn-success mb-3">Adicionar paragem</a>

    {{-- tabela das paragens --}}
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Cidade</th>
                <th scope="col">Foto</th>
                <th scope="col">Data da visita</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($stops as $stop)
                <tr>
                    <td>{{ $stop->city }}</td>
                    <td><img class="trip-photo" src="{{ $stop->photo ? asset('storage/' . $stop->photo) : asset('images/nophoto.jpg') }}" alt="">
                    </td>
                    <td>{{ $stop->visit_date }}</td>
                    <td>
                        <a href="{{ route('stops.edit', $stop->id) }}" class="btn btn-outline-success">Editar</a>
                        <a href="{{ route('stops.delete', $stop->id) }}" class="btn btn-outline-danger">Apagar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('trips.all') }}" class="btn btn-outline-success">Voltar</a>
@endsection