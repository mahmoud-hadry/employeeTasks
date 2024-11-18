@extends('layouts.app')

@section('content')
    <h1>Edit Department</h1>
    <form class="form-group" action="{{ route('departments.update', $department) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div>
            <label for="first_name">Department Name</label>
            <input type="text" name="name" id="first_name" value="{{ $department->name }}" required>
        </div>

        <button class="bg-red-500 text-black px-4 py-2 rounded" type="submit">Update</button>
    </form>
@endsection
