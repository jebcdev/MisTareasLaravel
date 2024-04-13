@extends('adminlte::page')

@section('title')
    {{ config('app.name') }}
@stop

@section('content_header')
    <h1 class="text-center">
        Detalles de la Categoría: {{ $category->name }}
    </h1>
@stop

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title class="badge badge-secondary">
                                Detalles de la Categoría: {{ $category->name }}
                            </span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('admin.categories.index') }}"> Volver</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $category->name }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $category->description }}
                        </div>

                    </div>

                    <div class="card-footer float-end">
                        @if ($category->deleted_at == null)
                            <form action="{{ route('admin.categories.destroy', $category) }}" method="POST">
                                <a class="btn btn-sm btn-success" href="{{ route('admin.categories.edit', $category) }}"><i
                                        class="fa fa-fw fa-edit"></i> Editar</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i>
                                    Desactivar</button>
                            </form>
                        @else
                            <form action="{{ route('admin.categories.restore', $category->id) }}" method="POST">
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
