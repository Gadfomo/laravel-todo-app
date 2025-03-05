@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mt-4">
    <h2>My Tasks</h2>
    <a href="{{ route('tasks.create') }}" class="btn btn-primary">Add New Task</a>
</div>

<!-- Filter Form -->
<form method="GET" action="{{ route('tasks.index') }}" class="mt-3">
    <div class="row g-2 align-items-center">
        <div class="col-auto">
            <select name="status" class="form-select">
                <option value="">-- Filter by Status --</option>
                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
            </select>
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-secondary">Apply Filter</button>
        </div>
    </div>
</form>

@if($tasks->count() > 0)
    <div class="list-group mt-3">
        @foreach($tasks as $task)
            <div class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <h5>{{ $task->title }}
                        <span class="badge bg-{{ $task->status == 'completed' ? 'success' : 'warning' }}">
                            {{ ucfirst($task->status) }}
                        </span>
                        @if(isset($task->priority))
                          <span class="badge bg-info">
                              {{ ucfirst($task->priority) }} Priority
                          </span>
                        @endif
                    </h5>
                    <p>{{ $task->description }}</p>
                    <p>
                        <small>
                            Due: {{ $task->due_date ? \Carbon\Carbon::parse($task->due_date)->format('M d, Y') : 'No due date' }}
                        </small>
                    </p>
                </div>
                <div>
                    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-secondary btn-sm">Edit</a>
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this task?')">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@else
    <p class="mt-3">No tasks available. Please add a new task.</p>
@endif
@endsection
