@extends('layouts.fo')

@section('content')
    <h1 class="my-4">Olá, {{ Auth::user()->name }}</h1>

    @if (Auth::user()->user_type == App\Models\User::TYPE_ADMIN)
        <div class="alert alert-success" role="alert">
            Conta de Administrador
        </div>
    @endif

    {{-- contagem até ao Natal --}}
    <div class="alert alert-success" role="alert">
        🎄 Faltam <strong>{{ $diasNatal }}</strong> dias para o Natal!
    </div>
@endsection