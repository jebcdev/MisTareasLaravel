@extends('adminlte::page')

@section('title')
    {{ config('app.name') }}
@stop

@section('content_header')
    <h1 class="text-center">
        Crear Notas | Tarea: {{ $task->name }}
    </h1>
@stop

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">



                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">
                            Crear Notas | Tarea: {{ $task->name }}
                        </span>
                    </div>
                    <div class="card-body">
                        
                            

                            @include('notes.form')

                        
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
