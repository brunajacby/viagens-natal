@extends('layouts.fo')

@section('content')
    <h1 class="my-4">Adicionar viagem</h1>

    <form method="POST" action="{{ route('trips.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="destination" class="form-label">Destino</label>
            <input required type="text" name="destination" class="form-control" id="destination">
        </div>
        @error('destination')
            <p>Destino inválido</p>
        @enderror

        <div class="mb-3">
            <label for="photo" class="form-label">Foto</label>
            <input type="file" name="photo" class="form-control" id="photo" accept="image/*">
        </div>
        @error('photo')
            <p>Foto inválida</p>
        @enderror

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('trips.all') }}" class="btn btn-outline-success">Voltar</a>
    </form>
@endsection