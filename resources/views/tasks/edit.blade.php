@extends('adminlte::page')

@section('title')
    {{ config('app.name') }}
@stop

@section('content_header')
    <h1 class="text-center">
        Editar Tarea
    </h1>
@stop

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">



                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">
                            Editar Tarea
                        </span>
                    </div>
                    <div class="card-body">
                        @include('tasks.form')
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    {{-- <script> console.log('Hi!'); </script> --}}
@stop
