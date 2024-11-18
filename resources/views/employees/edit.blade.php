@extends('layouts.app')

@section('content')
    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
        <div class="max-w-xl">
    <section>
    <h1 class="text-lg font-medium text-gray-900 dark:text-gray-100">Edit Employee</h1>
    <form class="mt-6 space-y-6" action="{{ route('employees.update', $employee) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div>
            <x-input-label for="first name" :value="__('First Name')" />
            <x-text-input id="name" name="first_name" type="text" class="mt-1 block w-full" :value="old('first_name', $employee->first_name)" required autofocus autocomplete="first_name" />
            <x-input-error class="mt-2" :messages="$errors->get('first_name')" />
        </div>
        <div>
            <x-input-label for="last name" :value="__('Last Name')" />
            <x-text-input id="last_name" name="last_name" type="text" class="mt-1 block w-full" :value="old('last_name', $employee->last_name)" required autofocus autocomplete="last_name" />
            <x-input-error class="mt-2" :messages="$errors->get('last_name')" />
        </div>
        <div>
            <x-input-label for="full name" :value="__('Full Name')" />
            <x-text-input id="full_name" name="full_name" type="text" class="mt-1 block w-full" :value="old('full_name', $employee->first_name.' '.$employee->last_name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>
        <div>
            <x-input-label for="last name" :value="__('Salary')" />
            <x-text-input id="salary" name="salary" type="text" class="mt-1 block w-full" :value="old('salary', $employee->salary)" required autofocus autocomplete="salary" />
            <x-input-error class="mt-2" :messages="$errors->get('salary')" />
        </div>

        <div>
            <x-input-label for="manager name" :value="__('Manager Name')" />
            <select class="mt-1 block w-full" name="manager_id" id="manager_id" required>
                @foreach ($employees as $manager)
                    <option value="{{ $manager->id }}" {{ $manager->id == $employee->manager_id ? 'selected' : '' }}>
                        {{ $manager->first_name.' '.$manager->last_name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $employee->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>
{{--        <div>--}}
{{--            <label for="department_id">Department</label>--}}
{{--            <select name="department_id" id="department_id" required>--}}
{{--                @foreach ($departments as $department)--}}
{{--                    <option value="{{ $department->id }}" {{ $department->id == $employee->department_id ? 'selected' : '' }}>--}}
{{--                        {{ $department->name }}--}}
{{--                    </option>--}}
{{--                @endforeach--}}
{{--            </select>--}}
{{--        </div>--}}
        <div>
            <x-input-label for="image" :value="__('Image')" />
            <x-text-input id="image" name="image" accept="image/*" type="file" class="mt-1 block w-full" :value="old('image', $employee->image)" required autocomplete="image" />
            @if ($employee->image)
                @if (str_contains($employee->image, 'https'))
                    <img src="{{ $employee->image }}" alt="Photo" width="50">
                @else
                    <img src="{{ asset('storage/' . $employee->image) }}" alt="Photo" width="50">
                @endif
            @endif
        </div>
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>
    </form>
    </section>
        </div>
    </div>
@endsection
