<form method="POST" action="{{ route('notes.store') }}" role="form" enctype="multipart/form-data">
    @csrf
    @method('POST')
    <div class="box box-info padding-1">
        <div class="box-body">

            <input type="hidden" id="task_id" name="task_id" value="{{$task->id}}">
            <div class="form-group">
                <label for="content">Contenido de la Nota</label>
                <textarea class="form-control" id="content" name="content" rows="5" required>{{ old('content') }}</textarea>
            </div>

        </div>
        <div class="box-footer mt20">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a class="btn btn-secondary" href="{{ route('tasks.show', $task) }}">Volver</a>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger mt-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</form>
