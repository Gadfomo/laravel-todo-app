<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index( Request $request)
    {
        $query = Task::where('user_id', Auth::id());

        // Filter by status if provided in the URL (e.g., ?status=pending or ?status=completed)
        if ($request->has('status') && in_array($request->status, ['pending', 'completed'])) {
            $query->where('status', $request->status);
        }
    
        // Retrieve the filtered tasks.
        $tasks = $query->get();
    
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'status' => 'required|in:pending,completed',
            'due_date' => 'nullable|date',
        ]);

        Task::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'due_date' => $request->due_date,
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
       if($task->user_id !== Auth::id()){
        abort(403);
       }
       return view('tasks.show', compact('task'));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        if($task->user_id !== Auth::id()){
            abort(403);
           }
        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        if($task->user_id !== Auth::id()){
            abort(403);
           }

        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'status' => 'required|in:pending,completed',
            'due_date' => 'nullable|date',
        ]);

        $task->update($request->all());

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        if($task->user_id !== Auth::id()){
            abort(403);
           }
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
}
