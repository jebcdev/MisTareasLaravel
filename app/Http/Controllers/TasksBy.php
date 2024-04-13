<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Models\Category;
use App\Models\Status;
use Illuminate\Http\Request;

class TasksBy extends Controller
{
    public function category()
    {
        $userId = auth()->user()->id;

        $categories = Category::query()
            ->whereHas('tasks', function ($query) use ($userId) {
                $query->where('user_id', $userId);
            })
            ->with(['tasks' => function ($query) use ($userId) {
                $query->where('user_id', $userId);
            }])
            ->withCount(['tasks' => function ($query) use ($userId) {
                $query->where('user_id', $userId);
            }])
            ->orderBy('name', 'asc')
            ->get();


        return view('tasksby.category', compact('categories'));
    }

    public function status()
    {
        $userId = auth()->user()->id;

        $statuses = Status::query()
            ->with(['tasks' => function ($query) use ($userId) {
                $query->where('user_id', $userId);
            }])
            ->withCount(['tasks' => function ($query) use ($userId) {
                $query->where('user_id', $userId);
            }])
            ->get();

        // return $statuses;

        return view('tasksby.status', compact('statuses'));
    }
}
