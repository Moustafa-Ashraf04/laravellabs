<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StudentRequest;


class StudentsController extends Controller
{

    public function index()
    {
        // $students = Student::where('id', Auth::id())->withTrashed()->get();

        // gets current students including soft deleted ones 
        // $students = Student::withTrashed()->get();

        $students = Student::all();
        return view('students.index', compact('students'));

        // this is to get the auth user added students only 
        // return view('students.index', ['students' => Auth::user()->students]);
    }

    public function details($id, ?string $name = null)
    {
        if ($name === null) {
            return '<h1>Details page of student # ' . $id . '</h1>';
        } else {
            return '<h1>Details page of student # ' . $id . ' named ' . $name . '</h1>';
        }
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(StudentRequest $request)
    {
        $student = new Student();


        $student->IDno = $request->IDno;
        $student->name = $request->name;
        $student->age = $request->age;
        $student->user_id = $request->user()->id;


        // this will store only the values i specified in the model file
        // Student::Create($request->all());

        // $student->save();
        $request->user()->students()->create($request->all());

        return redirect('/students/create')->with('success', 'Student added successfully');
    }

    public function edit(Student $id)
    {
        return view('students.edit', ['student' => $id]);
    }

    public function update(StudentRequest $request, Student $id)
    {
        $id->IDno = $request->IDno;
        $id->name = $request->name;
        $id->age = $request->age;
        if ($id->save()) {
            return redirect()->route('students.index');
        }
    }

    public function destroy(Student $id)
    {
        $id->delete();
        return redirect()->route('students.index');
    }
}