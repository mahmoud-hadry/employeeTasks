@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <x-primary-button>
        <a href="{{ route('tasks.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">New Task</a>
        </x-primary-button>
        <table class="table-auto w-full mt-4" id="tasks-table">
            <thead>
            <tr>
                <th>Assigned Employee</th>
                <th>Title</th>
                <th>Description</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($tasks as $task)
                <tr>
                    <td>{{ $task->employee->first_name }} {{ $task->employee->last_name }}</td>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->description }}</td>
                    <td>
                        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <select name="status" class="border-gray-300 rounded">
                                <option value="Pending" {{ $task->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                <option value="In Progress" {{ $task->status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                                <option value="Completed" {{ $task->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                            </select>
                            <x-primary-button>Update</x-primary-button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No tasks found for your employees.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#tasks-table').DataTable({
            dom: 'Bfrtip',
            buttons: [],
        });
    });
</script>
