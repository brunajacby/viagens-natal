{{-- usa o layout master --}}
@extends('layouts.fo')

@section('content')
    <h1 class="my-4">Registo</h1>

    {{-- formulário de registo --}}
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input required type="text" name="name" class="form-control" id="name">
        </div>
        @error('name')
            <p>Nome inválido</p>
        @enderror

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input required type="email" name="email" class="form-control" id="email">
        </div>
        @error('email')
            <p>Email inválido ou já registado</p>
        @enderror

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input required type="password" name="password" class="form-control" id="password">
        </div>
        @error('password')
            <p>Password inválida ou não coincide</p>
        @enderror

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirmar password</label>
            <input required type="password" name="password_confirmation" class="form-control" id="password_confirmation">
        </div>

        <button type="submit" class="btn btn-success">Registar</button>
    </form>
@endsection