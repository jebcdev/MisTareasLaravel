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
                                Listado de Tareas
                            </span>

                            <div class="float-right">
                                <a href="{{ route('tasks.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    Crear Tarea
                                </a>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-1">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="table">
                                <thead class="thead">
                                    <tr>

                                        <th>Fecha de Inicio</th>
                                        <th>Nombre</th>
                                        <th>Descripcion</th>
                                        <th>Estado</th>
                                        <th>Notas</th>


                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($tasks as $task)
                                    <tr>
                                        <td>{{ $task->created_at }}</td>
                                        <td>{{ $task->name }}</td>
                                        <td>{{ $task->description }}</td>
                                        <td>{{ $task->status->name }}</td>
                                        <td>{{ $task->notes_count }}</td>
                                
                                        <td>
                                            @if ($task->deleted_at == null)
                                                <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                                                    <a class="btn btn-sm btn-outline-primary" href="{{ route('tasks.show', $task) }}"><i class="far fa-eye"></i> Ver</a>
                                                    <a class="btn btn-sm btn-outline-success" href="{{ route('tasks.edit', $task) }}"><i class="far fa-edit"></i> Editar</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger"><i class="far fa-trash-alt"></i> Desactivar</button>
                                                </form>
                                            @else
                                                <form action="{{ route('tasks.restore', $task->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-sm btn-outline-secondary"><i class="fas fa-trash-restore"></i> Activar</button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>No hay tareas disponibles</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                @endforelse
                                
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{-- {!! $tasks->links() !!} --}}
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/datatables.min.css') }}">
@stop

@section('js')
    <script src="{{ asset('assets/js/jq.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                language: {
                    "decimal": "",
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                    "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                    "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ Entradas",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },
            });
        });
    </script>
@stop
