
@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h1>Escolha como deseja se cadastrar</h1>
    <div class="d-flex justify-content-center mt-4">
        <a href="{{ route('register', ['role' => 'cliente']) }}" class="btn btn-primary me-3">Cadastrar-se como Cliente</a>
        <a href="{{ route('register', ['role' => 'prestador']) }}" class="btn btn-success">Cadastrar-se como Prestador</a>
    </div>
</div>
@endsection
