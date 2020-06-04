@extends('adminlte::page')

@section('title', 'Sistema de Saldo')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">                        
                    <div class="card-body">

                        <button type="button" class="btn btn-labeled btn-success">
                            <span class="btn-label">
                            <i class="fas  fa-plus"></i>
                            <a class="#">Adicionar User</a>
                        </button><br><br>

                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Acção</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($users as $user)
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>
                                            <button type="button" class="btn btn-labeled btn-success">
                                                <span class="btn-label">
                                                <i class="fas  fa-edit"></i>
                                                <a class="text-white" href="{{route('admin.update', $user->id)}}">Editar</a>
                                            </button>

                                            <button type="button" class="btn btn-labeled btn-danger">
                                                <span class="btn-label">
                                                <i class="fas fa-trash"></i>
                                                <a class="text-white" href="{{route('admin.update', $user->id)}}">Apagar</a>
                                            </button>

                                            <button type="button" class="btn btn-labeled btn-dark">
                                                <span class="btn-label">
                                                <i class="fas  fa-eye"></i>
                                                <a class="text-white" href="{{route('admin.update', $user->id)}}">Ver Roles</a>
                                            </button>

                                        </td>
                                    </tr>
                                @empty
                                    <div class="card-body">
                                        <p class="mb-0">Nenhum post cadastrado!</p>
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                    <div>
            </div>
        </div>
    </div>
@stop
