@extends('adminlte::page')

@section('title', 'Sistema de Saldo')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                @forelse($noticias as $noticia)
                    @can('view_post', $noticia)
                        <div class="card-body">
                            <p class="mb-0"><strong>{{ $noticia->titulo }}</strong></p>
                            <p class="mb-0">{{ $noticia->descricao }}</p>
                            <br>
                            <p class="mb-0"><strong>Autor:</strong> {{ $noticia->user->name }}</p>
                    @endcan

                    @can('Editar_post', $noticia)
                        <a href="{{route('admin.update', $noticia->id)}}">Editar</a>
                    @endcan

                    @can('admin', $noticia)
                        <a href="{{route('admin.create')}}">Apagar</a>
                    @endcan

                        </div>
                    
                @empty
                    <div class="card-body">
                        <p class="mb-0">Nenhum post cadastrado!</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@stop
