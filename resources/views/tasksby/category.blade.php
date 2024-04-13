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
                                Listado de Tareas por Categoría
                            </span>


                        </div>
                    </div>


                    <div class="card-body">
                        <div class="row">
                            <div class="row">
                                @forelse ($categories as $category)
                                    <div class="col-md-4 mb-3">
                                        <div class="info-box">
                                            <span class="info-box-icon bg-info"><i class="far fa-bookmark"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">{{ $category->name }}</span>
                                                <span class="info-box-number">
                                                    {{ $category->tasks_count }} Tareas
                                                    <a href="{{ route('tasks.index', ['category_id' => $category->id ?? null]) }}"
                                                        class="btn btn-outline-info btn-sm">Consultar</a>
                                                </span>
                                                <span class="progress-description">
                                                    {{ $category->description }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    @if ($loop->last && $loop->iteration % 3 != 0)
                                        @for ($i = 0; $i < 3 - $loop->iteration % 3; $i++)
                                            <div class="col-md-4"></div>
                                        @endfor
                                    @endif
                                @empty
                                    <div class="col-md-12">
                                        <p>No hay tareas por categorías disponibles.</p>
                                    </div>
                                @endforelse
                            </div>
                            
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
