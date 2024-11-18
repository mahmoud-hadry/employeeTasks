@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4">Assign Task</h1>

        <form class="form-group" action="{{ route('tasks.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="title" class="block text-gray-700">Title:</label>
                <input type="text" name="title" id="title" class="border-gray-300 rounded mt-1 w-full" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700">Description:</label>
                <textarea name="description" id="description" class="border-gray-300 rounded mt-1 w-full" required></textarea>
            </div>

            <div class="mb-4">
                <label for="employee_id" class="block text-gray-700">Assign to Employee:</label>
                <select name="employee_id" id="employee_id" class="border-gray-300 rounded mt-1 w-full" required>
                    @foreach ($employees as $employee)
                        <option value="{{ $employee->id }}">{{ $employee->first_name }} {{ $employee->last_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="employee_id" class="block text-gray-700">Task Status:</label>
                <select name="status"  class="border-gray-300 rounded mt-1 w-full" required>
                        <option value="Pending">Pending</option>
                        <option value="In Progress">In Progress</option>
                        <option value="Completed">Completed</option>
                </select>
            </div>

            <x-primary-button>
                Assign Task</x-primary-button>
        </form>
    </div>
@endsection
