@extends('adminlte::page')

@section('title')
    {{ config('app.name') }}
@stop

@section('content_header')
    <h1 class="text-center">
        Listado de Categorías
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
                                Listado de Categorías
                            </span>

                            <div class="float-right">
                                <a href="{{ route('admin.categories.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    Crear Categorías
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
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>Id</th>

                                        <th>Nombre</th>
                                        <th>Descripción</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($categories as $category)
                                        <tr>
                                            <td>{{ $category->id }}</td>
                                            <td>{{ $category->name }}</td>
                                            <td>{{ $category->description }}</td>
                                            <td>
                                                @if ($category->deleted_at == null)
                                                    <form action="{{ route('admin.categories.destroy', $category) }}"
                                                        method="POST">
                                                        <a class="btn btn-sm btn-outline-primary"
                                                            href="{{ route('admin.categories.show', $category) }}"><i
                                                                class="far fa-eye"></i> Ver</a>
                                                        <a class="btn btn-sm btn-outline-success"
                                                            href="{{ route('admin.categories.edit', $category) }}"><i
                                                                class="far fa-edit"></i> Editar</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-outline-danger"><i
                                                                class="far fa-trash-alt"></i> Desactivar</button>
                                                    </form>
                                                @else
                                                    <form action="{{ route('admin.categories.restore', $category->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" class="btn btn-sm btn-outline-secondary"><i
                                                                class="fas fa-trash-restore"></i> Activar</button>
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
                {!! $categories->links() !!}
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
