@extends('adminlte::page')

@section('title')
    {{ config('app.name') }}
@stop

@section('content_header')
    <h1 class="text-center">

    </h1>
@stop

@section('content')
    <div class="text-center mb-2">
        <h1>
            Mis Tareas
        </h1>
    </div>

    <div class="row">
        <div class="col-6">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Administrar Categorías</h3>
                </div>
                <div class="card-body">
                    <a type="button" class="btn btn-outline-primary" href="{{ route('admin.categories.index') }}">Ir a Categorías</a>
                </div>
            </div>
        </div>
    
        <div class="col-6">
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">Gestionar Mis Tareas</h3>
                </div>
                <div class="card-body">
                    <a type="button" class="btn btn-outline-dark" href="{{ route('tasks.index') }}">Ir a Mis Tareas</a>
                </div>
            </div>
        </div>
    </div>
    

    <h2 class="text-center m-3">Consultas</h2>

    <div class="row">
        <div class="col-6">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Tareas por Categoría</h3>
                </div>
                <div class="card-body">
                    <a type="button" class="btn btn-outline-primary" href="{{ route('tasksbycategory.index') }}">Consultar</a>
                </div>
            </div>
        </div>
    
        <div class="col-6">
            <div class="card card-outline card-warning">
                <div class="card-header">
                    <h3 class="card-title">Tareas por Estado</h3>
                </div>
                <div class="card-body">
                    <a type="button" class="btn btn-outline-warning" href="{{ route('tasksbystatus.index') }}">Consultar</a>
                </div>
            </div>
        </div>
    </div>
    

@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    {{-- <script> console.log('Hi!'); </script> --}}
@stop
