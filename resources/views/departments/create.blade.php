@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4">Add Department</h1>

        <form action="{{ route('departments.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Department Name:</label>
                <input type="text" name="name" id="name" class="border-gray-300 rounded mt-1 w-full" required>
            </div>

            <button class="bg-red-500 text-black px-4 py-2 rounded">Add Department</button>
        </form>
    </div>
@endsection
