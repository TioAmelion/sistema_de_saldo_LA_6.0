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
                    <a href="{{route('admin.listarUser')}}" class="btn btn-primary"><i class="fas fa-user"></i> Total Users {{$users}}</a>

                    <a href="{{route('admin.listarPost')}}" class="btn btn-danger"><i class="fas fa-user"></i>Total Posts {{$noticias}}</a>

                    <a href="{{route('admin.role')}}" class="btn btn-info"><i class="fa fa-user"></i> Total Roles {{$roles}}</a>

                    <a href="{{route('admin.permission')}}" class="btn btn-info"><i class="fa fa-user"></i> Total Permissions {{$permissions}}</a>
                     

                    <br><br>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3><i class="fas fa-dollar-sign">564</i></h3>
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
