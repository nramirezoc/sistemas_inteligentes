@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Mis Tareas</h1>

    <!-- Si hay un mensaje de éxito, se muestra en un alert -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <ul class="list-group">
                @foreach ($tasks as $task)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <strong>{{ $task->title }}</strong><br>
                            <small>{{ $task->description }}</small><br>
                            <span class="badge bg-{{ $task->status == 'completed' ? 'success' : 'warning' }}">{{ ucfirst($task->status) }}</span>
                        </div>
                        <div>
                            <!-- Botón de "Marcar como completada" -->
                            @if ($task->status == 'pending')
                                <form action="{{ route('tasks.updateStatus', $task->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-success btn-sm">Marcar como completada</button>
                                </form>
                            @endif
                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary btn-sm me-2">Editar</a>

                            <!-- Botón de eliminar -->
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('tasks.create') }}" class="btn btn-success">Agregar tarea</a>
    </div>
</div>
@endsection
