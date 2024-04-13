<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoteStoreRequest;
use App\Models\Note;
use App\Models\Task;
use Illuminate\Http\Request;

class NoteController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create(Task $task)
    {
        return view('notes.create', compact('task'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NoteStoreRequest $request)
    {
        Note::create($request->validated());

        return redirect()->route('tasks.show',$request->input( 'task_id'))
            ->with('success', 'Nota Creada Exitosamente!');
    }


    public function destroy(Note $note)
    {
        $note->delete();
        return redirect()->back();
    }
}
