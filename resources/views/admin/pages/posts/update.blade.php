@extends('adminlte::page')

@section('title', 'Sistema de Saldo')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard - Update</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                    <div class="card-body">
                        <p class="mb-0"><strong>{{ $noticia->titulo }}</strong></p>
                        <p class="mb-0">{{ $noticia->descricao }}</p>
                        <br>
                        <p class="mb-0"><strong>Autor:</strong> {{ $noticia->user->name }}</p>
                    </div>
            </div>
        </div>
    </div>
@stop