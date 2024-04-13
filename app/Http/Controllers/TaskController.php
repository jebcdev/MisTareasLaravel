<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskStoreRequest;
use App\Http\Requests\TaskUpdateRequest;
use App\Models\Category;
use App\Models\Status;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $tasks = Task::query()
            ->with([
                'user',
                'category',
                'notes',
            ])
            ->withCount('notes')
            ->where('user_id', auth()->user()->id)
            ->when($request->filled('category_id'), function ($query) use ($request) {
                return $query->where('category_id', $request->category_id);
            })
            ->when($request->filled('status_id'), function ($query) use ($request) {
                return $query->where('status_id', $request->status_id);
            })
            ->orderBy('status_id', 'asc')
            ->get();

        return view('tasks.index', compact('tasks'));
    }




    public function show(Task $task)
    {

        $task->load([
            'user',
            'category',
            'notes',
        ]);


        return view('tasks.show', compact('task'));
    }

    public function create()
    {
        $action = route('tasks.store');
        $method = 'POST';
        $task = new  Task();
        $categories = Category::query()->orderby('name', 'asc')->get();
        $statuses = Status::query()->orderby('id', 'asc')->get();

        return view('tasks.create', compact([
            'action',
            'method',
            'task',
            'categories',
            'statuses',
        ]));
    }

    public function store(TaskStoreRequest $request)
    {


        Task::create($request->all());

        return redirect()->route('tasks.index')
            ->with('success', 'Tarea Creada Exitosamente!');
    }

    public function edit(Task $task)
    {


        $action = route('tasks.update', $task);
        $method = 'PUT';
        $categories = Category::query()->orderby('name', 'asc')->get();
        $statuses = Status::query()->orderby('id', 'asc')->get();

        return view('tasks.edit', compact([
            'action',
            'method',
            'task',
            'categories',
            'statuses',
        ]));
    }

    public function update(TaskUpdateRequest $request, Task $task)
    {


        $task->update($request->validated());

        return redirect()->route('tasks.index')
            ->with('success', 'Tarea Actualizada Exitosamente!');
    }

        public function destroy(Task $task){
            

            $task->delete();

            return redirect()->route('tasks.index')
            ->with('success', 'Tarea Eliminada Exitosamente!');
        }
}
