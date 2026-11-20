@extends('layouts.fo')

@section('content')
    <h1 class="my-4">Adicionar paragem – {{ $trip->destination }}</h1>

    <form method="POST" action="{{ route('stops.store') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="trip_id" value="{{ $trip->id }}">

        <div class="mb-3">
            <label for="city" class="form-label">Cidade</label>
            <input required type="text" name="city" class="form-control" id="city">
        </div>
        @error('city')
            <p>Cidade inválida</p>
        @enderror

        <div class="mb-3">
            <label for="visit_date" class="form-label">Data da visita</label>
            <input required type="date" name="visit_date" class="form-control" id="visit_date">
        </div>
        @error('visit_date')
            <p>Data inválida</p>
        @enderror

        <div class="mb-3">
            <label for="photo" class="form-label">Foto</label>
            <input type="file" name="photo" class="form-control" id="photo" accept="image/*">
        </div>
        @error('photo')
            <p>Foto inválida</p>
        @enderror

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('stops.trip', $trip->id) }}" class="btn btn-outline-success">Voltar</a>
    </form>
@endsection