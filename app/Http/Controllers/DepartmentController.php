<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::withCount('employees')->get();
        return view('departments.index', compact('departments'));
    }

    public function create()
    {
        return view('departments.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:departments,name|max:255',
        ]);

        Department::create($validated);
        return redirect()->route('departments.index')->with('success', 'Department added successfully!');
    }
    public function edit(Department $department)
    {
        return view('departments.edit', compact('department'));
    }

    public function update(Request $request, Department $department)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:departments,name,' . $department->id,
        ]);
        $department->update($validated);

        return redirect()->route('departments.index')->with('success', 'Department updated successfully.');
    }


    public function destroy(Department $department)
    {
        if ($department->employees()->exists()) {
            return redirect()->route('departments.index')->with('error', 'Cannot delete a department with assigned employees.');
        }

        $department->delete();
        return redirect()->route('departments.index')->with('success', 'Department deleted successfully!');
    }
}
