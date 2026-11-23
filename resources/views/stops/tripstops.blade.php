@extends('layouts.fo')

@section('content')
    <h1 class="my-4">{{ $trip->destination }}</h1>

    {{-- mensagem de sucesso --}}
    @if (session('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @endif

    {{-- só o admin adiciona --}}
    @auth
        @if (Auth::user()->user_type == 1)
            <a href="{{ route('stops.add', $trip->id) }}" class="btn btn-success mb-3">Adicionar paragem</a>
        @endif
    @endauth

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
                        {{-- editar com login, apagar só admin --}}
                        @auth
                            <a href="{{ route('stops.edit', $stop->id) }}" class="btn btn-outline-success">Editar</a>

                            @if (Auth::user()->user_type == 1)
                                <a href="{{ route('stops.delete', $stop->id) }}" class="btn btn-outline-danger" onclick="return confirm('Tem a certeza que quer apagar esta paragem?')">Apagar</a>
                            @endif
                        @endauth
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('trips.all') }}" class="btn btn-outline-success">Voltar</a>
@endsection