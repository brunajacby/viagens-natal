@extends('layouts.fo')

@section('content')
    <h1 class="my-4">Login</h1>

    {{-- formulário de login --}}
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input required type="email" name="email" class="form-control" id="email">
        </div>
        @error('email')
            <p>Email ou password inválidos</p>
        @enderror

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input required type="password" name="password" class="form-control" id="password">
        </div>

        <button type="submit" class="btn btn-success">Entrar</button>
    </form>
@endsection