<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::where('employee_id', Auth::id())->get();
        return view('tasks.index', compact('tasks'));
    }
    public function myEmployeeTasks()
    {
        $managerId = Auth::id();
        $tasks = Task::with('employee')
            ->whereHas('employee', function ($query) use ($managerId) {
                $query->where('manager_id', $managerId);
            })
            ->get();
        return view('tasks.myEmployeeTasks', compact('tasks'));
    }

    public function create()
    {
        $managerId = Auth::id();
        $employees = Employee::where('manager_id', $managerId)->get();
        return view('tasks.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:Pending,In Progress,Completed',
            'employee_id' => 'required|exists:employees,id',
        ]);

        Task::create($validated);
        return redirect()->route('tasks.index')->with('success', 'Task created successfully!');
    }
    public function edit(Task $task)
    {
        $employees = Employee::all(); // List of employees for assignment
        return view('tasks.edit', compact('task', 'employees'));
    }
    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'status' => 'required|in:Pending,In Progress,Completed',
        ]);

        $task->update($validated);
        return redirect()->back()->with('success', 'Task status updated!');
    }

}
