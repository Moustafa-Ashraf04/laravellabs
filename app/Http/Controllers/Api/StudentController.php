<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use App\Models\Student;
use App\Http\Resources\StudentResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;


class StudentController extends Controller
{

    public function index()
    {
        // index all students
        // $students = Student::all();

        //paginator with 5 results per page
        $students = Student::pagination(3);

        // Get the authenticated user and index his students only
        $user = Auth::user();

        // $students = $user->students;


        // Return the collection of students using the StudentResource
        return StudentResource::collection($students);
    }

    public function show($id)
    {
        $student = Student::find($id);
        // return new StudentResource($student);

        if ($student) {
            return new StudentResource($student);
        } else {
            return response()->json(['message' => 'Student not found'], 404);
        }
    }

    public function store(StudentRequest $request)
    {
        $request->merge(['user_id' => Auth::id()]);

        $student = Student::create($request->all());

        return response()->json(['message' => 'Student added successfully', 'student' => $student], 201);
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return response()->json(['message' => 'Student deleted successfully'], 200);
    }
}