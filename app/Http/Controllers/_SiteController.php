<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class _SiteController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function admin()
    {
        return view('admin.index');
    }

    public function tasks()
    {
        $task = Task::inRandomOrder()
            ->with([
                'user',
                'category',
                'notes',
            ])
            ->first();
    
        return $task;
    }
    
}
