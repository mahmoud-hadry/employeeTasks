@extends('layouts.app')

@section('content')
    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
        <section>
        <x-primary-button><a href="{{ route('departments.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add Department</a></x-primary-button>
                <table class="table-auto w-full mt-4" id="departments-table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Employee Count</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($departments as $department)
                <tr>
                    <td>{{ $department->name }}</td>
                    <td>{{ $department->employees_count }}</td>
                    <td>

                        <a href="{{ route('departments.edit', $department) }}">
                            <button class=" text-black px-4 py-2 rounded">Edit</button>
                        </a>

                        <form action="{{ route('departments.destroy', $department) }}" method="POST">
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
        $('#departments-table').DataTable({
            dom: 'Bfrtip',
            buttons: [
                // 'excel', 'pdf', 'print'
            ]
        });
    });
</script>
