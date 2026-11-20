{{-- usa o layout master --}}
@extends('layouts.fo')

@section('content')
    <h1 class="my-4">{{ $trip->destination }}</h1>

    {{-- tabela das paragens --}}
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Cidade</th>
                <th scope="col">Foto</th>
                <th scope="col">Data da visita</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($stops as $stop)
                <tr>
                    <td>{{ $stop->city }}</td>
                    <td>{{ $stop->photo }}</td>
                    <td>{{ $stop->visit_date }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('trips.all') }}" class="btn btn-outline-success">Voltar</a>
@endsection