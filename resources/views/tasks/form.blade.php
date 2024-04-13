<form action="{{ $action }}" method="POST">
    @csrf
    @method($method)

    <input type="hidden" name="user_id" id="user_id" value="{{ auth()->user()->id }}">

    <div class="form-group">
        <label for="name">Nombre:</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Ingrese el nombre"
            value="{{ old('name', $task->name) }}">
    </div>

    <div class="form-group">
        <label for="description">Descripción:</label>
        <textarea class="form-control" id="description" name="description" placeholder="Ingrese la descripción">{{ old('description', $task->description) }}</textarea>
    </div>

    <div class="form-group">
        <label for="category">Categoría:</label>
        <select class="form-control" id="category" name="category_id">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $category->id == $task->category_id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="status">Estado:</label>
        <select class="form-control" id="status" name="status_id">
            @foreach ($statuses as $status)
                <option value="{{ $status->id }}" {{ $status->id == $task->status_id ? 'selected' : '' }}>
                    {{ $status->name }}
                </option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>
    <a class="btn btn-secondary" href="{{ route('tasks.index') }}"> Volver</a>

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
