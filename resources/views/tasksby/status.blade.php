@extends('adminlte::page')

@section('title')
    {{ config('app.name') }}
@stop

@section('content_header')
    <h1 class="text-center">
        Mis Tareas
    </h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                Listado de Tareas por Estado
                            </span>


                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            @foreach ($statuses as $status)
                                <div class="col-md-4">
                                    <div class="info-box bg-gradient-warning">
                                        <span class="info-box-icon"><i class="far fa-calendar-alt"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">{{ $status->name }}</span>
                                            <span class="info-box-number">{{ $status->tasks_count }} Tareas</span>
                                            <div>
                                                <a href="{{ route('tasks.index', ['status_id' => $status->id ?? null]) }}"
                                                    class="btn btn-dark">Consultar</a>
                                            </div>
                                            <span class="progress-description">
                                                {{ $status->description }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
@stop

@section('css')

@stop

@section('js')

@stop
