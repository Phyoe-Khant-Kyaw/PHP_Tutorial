@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        New Task
    </div>
    <div class="card-body">
        <form action="{{ route('task.store') }}" method="POST" class="form-horizontal">
            @csrf
            <div class="form-group">
                <label for="task" class="col-12 control-label">Task</label>
                <div class="col-12">
                    <input type="text" name="task" id="task-name" class="form-control">
                    @error("task")
                    <small class="font-weight-bold text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group mt-3">
                <div class="col-offset-3 col-6">
                    <button type="submit" class="btn btn-light btn-sm">
                        + Add Task
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="card mt-3">
    <div class="card-header">
        Current Tasks
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Task</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                <tr>
                    <td>{{ $task->id }}</td>
                    <td>{{ $task->name }}</td>
                    <td>
                        <form action="{{ route('task.destroy',$task->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('task.edit',$task->id) }}" class="text-decoration-none">
                                <button class="btn btn-warning btn-sm">Edit</button>
                            </a>
                            <button class="btn btn-danger btn-sm" onclick='return confirm("Are you sure to delete?")'>
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection