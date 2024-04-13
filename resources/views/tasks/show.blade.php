@extends('adminlte::page')

@section('title')
    {{ config('app.name') }}
@stop

@section('content_header')
    <h1 class="text-center">
        {{ $task->name }}
    </h1>
@stop

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title badge badge-secondary">
                                Detalles
                            </span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('tasks.index') }}"> Volver</a>
                            <a class="btn btn-warning" href="{{ route('notes.create', $task) }}"> Añadir Nota</a>
                        </div>
                    </div>
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success m-1">
                                <p>{{ $message }}</p>
                            </div>
                        @endif

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $task->name }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $task->description }}
                        </div>

                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $task->category->name }}
                        </div>

                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $task->status->name }}
                        </div>


                        <div class="table-responsive">
                            <h2 class="text-center">NOTAS</h2>

                            <table class="table">


                                <thead>
                                    <tr>
                                        <th scope="col">Contenido</th>
                                        <th scope="col">Fecha</th>
                                        <th scope="col">Acciones</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($task->notes as $note)
                                        <tr class="">
                                            <td scope="row">{{ $note->content }}</td>
                                            <td>{{ $note->created_at }}</td>
                                            <td>
                                                <form action="{{ route('notes.destroy', $note) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="fa fa-fw fa-trash"></i> Desactivar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>


                    </div>

                    <div class="card-footer float-end">
                        @if ($task->deleted_at == null)
                            <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                                <a class="btn btn-sm btn-success" href="{{ route('tasks.edit', $task) }}"><i
                                        class="fa fa-fw fa-edit"></i> Editar</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i>
                                    Desactivar</button>
                            </form>
                        @else
                            <form action="{{ route('tasks.restore', $task->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-secondary btn-sm"><i class="fas fa-trash-restore"></i>
                                    Activar</button>
                            </form>
                        @endif
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
