@extends('layouts.app')

@section('content')
    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
        <section>
        <x-primary-button><a href="{{ route('employees.create') }}">Add Employee</a></x-primary-button>
            <table id="employee-table">
            <thead>
            <tr>
                <th>Photo</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Managed Name</th>
                <th>Department</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($employees as $employee)
                <tr>
                    <td>
                        @if (str_contains($employee->image, 'https'))
                            <img src="{{ $employee->image }}" alt="Photo" width="50">
                        @else
                            <img src="{{ asset('storage/' . $employee->image) }}" alt="Photo" width="50">
                        @endif
                    </td>
                    <td>{{ $employee->first_name }} {{ $employee->last_name }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->phone }}</td>
                    <td>@if(isset($employee->manager)) {{ $employee->manager->first_name }} {{ $employee->manager->last_name }}@else NON @endif</td>
                    <td>{{ $employee->department->name }}</td>
                    <td>
                        <button class="ml-2 bg-blue-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-blue-600 focus:ring-2 focus:ring-blue-400"><a href="{{ route('chat', $employee->id)}}">Chat</a></button>
                        <x-primary-button><a href="{{ route('employees.edit', $employee) }}">Edit</a></x-primary-button>
                        </a>
                        <form action="{{ route('employees.destroy', $employee) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-500 text-white px-4 py-2 rounded">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
            </section>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#employee-table').DataTable({
            dom: 'Bfrtip',
            buttons: [
                // 'excel', 'pdf', 'print'
            ]
        });
    });
</script>
