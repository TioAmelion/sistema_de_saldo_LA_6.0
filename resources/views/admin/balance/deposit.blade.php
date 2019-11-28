@extends('adminlte::page')

@section('title', 'Sistema de Saldo')

@section('content_header')
    <h1 class="m-0 text-dark">Deposito</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{route('admin.deposit.store')}}">
                    @csrf
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="valor da recarga" name="saldo">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Enviar</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
