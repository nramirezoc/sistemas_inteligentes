<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task; // Asegúrate de importar el modelo Task

class TaskController extends Controller
{
    public function index() {
        $tasks = Task::all(); // Obtener todas las tareas
        return view ('tasks.index', compact('tasks')); // Pasar las tareas a la vista
    }
    
    public function store(Request $request) {
        $task = new Task();
        $task->title = $request->input('title');
        $task->description = $request->input('description');
        $task->status = $request->input('status', 'pending'); // Valor por defecto
        $task->save();
        return redirect()->route('tasks.index'); // Redirigir a la vista de tareas
    }

    public function edit ($id) {
        $task = Task::findOrFail($id); // Obtener la tarea por ID
        return view('tasks.edit', compact('task')); // Pasar la tarea a la vista de edición
    }
    public function create() {
        return view('tasks.create'); // Mostrar formulario para crear una nueva tarea
    }
    
    public function update(Request $request, $id) {
        $task = Task::findOrFail($id);
        $task->title = $request->input('title');
        $task->description = $request->input('description');
        $task->status = $request->input('status', 'pending'); // Valor por defecto
        $task->save();
        return redirect()->route('tasks.index');// Redirigir a la vista de tareas
    }
    
    public function destroy($id) {
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect()->route('tasks.index'); // Redirigir a la vista de tareas
    }

    public function updateStatus($id)
    {
        $task = Task::findOrFail($id); // Buscar la tarea por su ID
        $task->status = 'completed';  // Cambiar el estado a 'completada'
        $task->save();  // Guardar los cambios en la base de datos

        return redirect()->route('tasks.index')->with('success', 'Tarea marcada como completada.');
    }
    
}
