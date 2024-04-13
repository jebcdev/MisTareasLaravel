@extends('layouts.base')

@section('title')
    {{ config('app.name') }}
@endsection

@section('styles')
    {{-- <style></style> --}}
@endsection

@section('h3')
    {{ config('app.name') }}
@endsection

@section('content')
    <div class="card m-5">
        <div class="card-header">
            <div class="card-title text-center">
                &nbsp;
            </div>
        </div>
        <div class="card-body">
            <div class="card-text text-center">
                
                <img src="{{ asset('assets/img/logo.png') }}" alt="Mis Tareas" width="100px">
                <br>
                @auth
                    <a class="btn btn-secondary" href="{{ route('admin.index') }}">Panel</a>
                @endauth
            </div>
        </div>
        <div class="card-footer">
            <div class="card-text text-center">
                {{ config('app.name') }}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {{-- <script></script> --}}
@endsection
