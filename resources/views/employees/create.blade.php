@extends('layouts.app')

@section('content')
    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
        <div class="max-w-xl">
            <section>
    <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
        <x-input-label for="first name" :value="__('First Name')" />
        <x-text-input id="name" name="first_name" type="text" class="mt-1 block w-full"  required autofocus autocomplete="first_name" />
        <x-input-error class="mt-2" :messages="$errors->get('first_name')" />
    </div>
    <div>
        <x-input-label for="last name" :value="__('Last Name')" />
        <x-text-input id="last_name" name="last_name" type="text" class="mt-1 block w-full"  required autofocus autocomplete="last_name" />
        <x-input-error class="mt-2" :messages="$errors->get('last_name')" />
    </div>
    <div>
        <x-input-label for="phone" :value="__(' Phone')" />
        <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full"  required autofocus autocomplete="phone" />
        <x-input-error class="mt-2" :messages="$errors->get('phone')" />
    </div>
    <div>
        <x-input-label for="last name" :value="__('Salary')" />
        <x-text-input id="salary" name="salary" type="text" class="mt-1 block w-full" required autofocus autocomplete="salary" />
        <x-input-error class="mt-2" :messages="$errors->get('salary')" />
    </div>

    <div>
        <x-input-label for="manager name" :value="__('Manager Name')" />
        <select class="mt-1 block w-full" name="manager_id" id="manager_id" required>
            @foreach ($employees as $manager)
                <option value="{{$manager->id}}">
                    {{ $manager->first_name.' '.$manager->last_name }}
                </option>
            @endforeach
        </select>
    </div>
    <div>
        <x-input-label for="email" :value="__('Email')" />
        <x-text-input id="email" name="email" type="email" class="mt-1 block w-full"  required autocomplete="username" />
        <x-input-error class="mt-2" :messages="$errors->get('email')" />
    </div>
    <div>
        <x-input-label for="password" :value="__('Password')" />
        <x-text-input id="password" name="password" type="password" class="block mt-1 w-full"  required />
        <x-input-error class="mt-2" :messages="$errors->get('email')" />
    </div>

    <div>
        <label for="department_id">Department</label>
        <select class="mt-1 block w-full" name="department_id" id="department_id" required>
            @foreach ($departments as $department)
                <option value="{{$department->id}}">
                    {{ $department->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div>
        <x-input-label for="image" :value="__('Image')" />
        <x-text-input id="image" name="image" type="file" accept="image/*" class="mt-1 block w-full"  required autocomplete="image" />
    </div>
    <div class="flex items-center gap-4">
        <x-primary-button>{{ __('Save') }}</x-primary-button>
    </div>
    </form>
            </section>
        </div>
        </div>
@endsection
