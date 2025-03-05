@extends('layouts.app')

@section('content')
<div class="mt-4">
    <h2>Create New Task</h2>
    <form action="{{ route('tasks.store') }}" method="POST" class="mt-3">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Task Title</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="Enter task title" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" id="description" rows="3" placeholder="Enter task description"></textarea>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-select">
                <option value="pending">Pending</option>
                <option value="completed">Completed</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="priority" class="form-label">Priority</label>
            <select name="priority" id="priority" class="form-select">
                <option value="low">Low</option>
                <option value="medium" selected>Medium</option>
                <option value="high">High</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="due_date" class="form-label">Due Date</label>
            <input type="date" name="due_date" class="form-control" id="due_date">
        </div>
        <button type="submit" class="btn btn-primary">Create Task</button>
    </form>
</div>
@endsection
