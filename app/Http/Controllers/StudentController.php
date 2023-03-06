<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $students = Student::query();

        // If a search query is present, filter the results
        if ($request->input('search')) {
            $searchQuery = $request->input('search');
            $students->where('student_lrn', 'LIKE', "%{$searchQuery}%")
                ->orWhere('first_name', 'LIKE', "%{$searchQuery}%")
                ->orWhere('middle_name', 'LIKE', "%{$searchQuery}%")
                ->orWhere('last_name', 'LIKE', "%{$searchQuery}%")
                ->orWhere('age', 'LIKE', "%{$searchQuery}%")
                ->orWhere('year_level', 'LIKE', "%{$searchQuery}%")
                ->orWhere('section', 'LIKE', "%{$searchQuery}%");
        }

        $students = $students->paginate(10);

        return view('students.index', compact('students'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_lrn' => 'required|string|max:12|unique:students,student_lrn',
            'first_name' => 'required|string|max:30',
            'middle_name' => 'nullable|string|max:30',
            'last_name' => 'required|string|max:30',
            'age' => 'required|integer',
            'year_level' => 'required|string|max:15',
            'section' => 'required|string|max:30'
        ]);
    
        Student::create($request->all());
    
        return redirect()->route('students.index')
            ->with('success','Student created successfully.');
    }

    /**
     * Display the specified resource.
     */
        public function show(Student $student)
    {
        return view('students.show',compact('student'));
    }

    public function edit(Student $student)
    {
        return view('students.edit',compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'student_lrn' => 'required|string|max:12|unique:students,student_lrn,' .$student->id,
            'first_name' => 'required|string|max:30',
            'middle_name' => 'nullable|string|max:30',
            'last_name' => 'required|string|max:30',
            'age' => 'required|integer',
            'year_level' => 'required|string|max:15',
            'section' => 'required|string|max:30'
        ]);

        $student->update($request->all());

        return redirect()->route('students.index')
            ->with('success','Student updated successfully');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')
            ->with('success','Student deleted successfully');

    }
}
