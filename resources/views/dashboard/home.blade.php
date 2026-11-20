@extends('layouts.fo')

@section('content')
    <h1 class="my-4">Olá, {{ Auth::user()->name }}</h1>
@endsection