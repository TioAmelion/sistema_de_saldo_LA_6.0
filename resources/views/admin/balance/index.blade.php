@extends('adminlte::page')

@section('title', 'Sistema de Saldo')

@section('content_header')
    <ol class="breadcrumb">
        <li><a href="#">Dashboard-</a></li>
        <li><a href="#">Saldo</a></li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{route('admin.deposit')}}" class="btn btn-primary"><i class="fas fa-dollar-sign"></i> Recarregar</a>
                    <a href="" class="btn btn-primary"><i class="fas fa-hand-holding-usd"></i> Sacar</a><br><br>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3><i class="fas fa-dollar-sign"> {{ number_format($dados, 2, '.', ',')}}</i></h3>
                                <p>Saldo</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                                <a href="#" class="small-box-footer">Historico<i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
