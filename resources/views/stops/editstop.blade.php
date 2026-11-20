@extends('layouts.fo')

@section('content')
    <h1 class="my-4">Editar paragem</h1>

    <form method="POST" action="{{ route('stops.update') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{ $stopInfo->id }}">
        <input type="hidden" name="trip_id" value="{{ $stopInfo->trip_id }}">

        <div class="mb-3">
            <label for="city" class="form-label">Cidade</label>
            <input required type="text" name="city" value="{{ $stopInfo->city }}" class="form-control" id="city">
        </div>
        @error('city')
            <p>Cidade inválida</p>
        @enderror

        <div class="mb-3">
            <label for="visit_date" class="form-label">Data da visita</label>
            <input required type="date" name="visit_date" value="{{ $stopInfo->visit_date }}" class="form-control" id="visit_date">
        </div>
        @error('visit_date')
            <p>Data inválida</p>
        @enderror

        <div class="mb-3">
            <label for="photo" class="form-label">Foto</label>
            <img class="trip-photo d-block mb-2" src="{{ $stopInfo->photo ? asset('storage/' . $stopInfo->photo) : asset('images/nophoto.jpg') }}" alt="">
            <input type="file" name="photo" class="form-control" id="photo" accept="image/*">
        </div>
        @error('photo')
            <p>Foto inválida</p>
        @enderror

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('stops.trip', $stopInfo->trip_id) }}" class="btn btn-outline-success">Voltar</a>
    </form>
@endsection