<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email_or_phone' => 'required|string',
            'password' => 'required|string',
        ]);

        $employee = Employee::where('email', $credentials['email_or_phone'])
            ->orWhere('phone', $credentials['email_or_phone'])
            ->first();

        if ($employee && Hash::check($credentials['password'], $employee->password)) {
            Auth::login($employee);

            return redirect()->route('dashboard'); // Change to your desired route
        }

        return back()->withErrors(['email_or_phone' => 'Invalid credentials.']);
    }
    public function index()
    {
        $employees = Employee::with('department', 'manager')->get();
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        $departments = Department::all();
        $employees = Employee::with('manager')->get();

        return view('employees.create', compact('departments', 'employees'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email',
            'phone' => 'required|string|max:20',
            'salary' => 'required',
            'password' => ['required', 'string', 'min:8', 'regex:/[A-Z]/', 'regex:/[a-z]/', 'regex:/[0-9]/', 'regex:/[@$!%*?&]/'
            ],
            'department_id' => 'required|exists:departments,id',
            'manager_id' => 'required|exists:employees,id',
            'image' => 'nullable|image|max:2048',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('employees', 'public'); // Store in public disk
        }

        $validated['password'] = Hash::make($request->password);
        Employee::create($validated);

        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }
    public function edit(Employee $employee)
    {
        $employees = Employee::with('manager')->get();
        return view('employees.edit', compact('employee', 'employees'));
    }


    public function update(Request $request, Employee $employee)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'manager_id' => 'required',
            'email' => 'required|email|unique:employees,email,' . $employee->id,
            'image' => 'nullable|image|max:2048',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            if ($employee->image) {
                Storage::disk('public')->delete($employee->image);
            }
            $validated['image'] = $request->file('image')->store('employees', 'public');
        }
        $employee->update($validated);

        return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully!');
    }
}
