<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Category;

class TaskController extends Controller
{
    // Binangkal Recipe

    public function index()
    {
        $pendingTasks = Task::where('is_completed', false)->get();

        $completedTasks = Task::where('is_completed', true)->get();

        return view('tasks.index', compact(
            'pendingTasks',
            'completedTasks'
        ));
    }

    public function create()
    {
        $categories = Category::all();

        return view('tasks.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category_id' => 'required|exists:categories,id',
            'due_date' => 'required|date|after_or_equal:today'
        ]);

        Task::create($request->all());

        return redirect()->route('tasks.index')
            ->with('success', 'Task created successfully.');
    }

    public function toggle(Task $task)
    {
        $task->is_completed = !$task->is_completed;

        $task->save();

        return redirect()->back();
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->back()
            ->with('success', 'Task deleted.');
    }
}