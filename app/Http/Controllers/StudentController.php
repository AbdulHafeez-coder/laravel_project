<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // List all students
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    // Show form to create
    public function create()
    {
        return view('students.create');
    }

    // Store new student
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'  => 'required|string|max:100',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email'
        ]);

        Student::create([
            'name' => $validated['name'],
            'email' => $validated['email'] ?? null,
            'phone' => $validated['phone'],
        ]);

        return redirect()->route('students.index')
                         ->with('success', 'Student created successfully!');
    }

    // Show single student
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    // Edit form
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    // Update student
    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'name'  => 'required|string|max:100',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email'
        ]);

        $student->update([
            'name' => $validated['name'],
            'email' => $validated['email'] ?? null,
            'phone' => $validated['phone'],
        ]);

        return redirect()->route('students.index')
                         ->with('success', 'Student updated successfully!');
    }

    // Delete student
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')
                         ->with('success', 'Student deleted successfully!');
    }
}
