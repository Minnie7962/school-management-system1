<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends BaseController
{
    public function __construct()
    {
        $this->middleware(['auth', 'check.role:student']);
    }

    public function index()
    {
        $students = Student::all();
        return view('student.index', compact('students'));
    }

    public function create()
    {
        return view('student.create');
    }

    public function store(Request $request)
    {
        $student = new Student();
        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $student->save();
        return redirect()->route('student.index');
    }

    public function show($id)
    {
        $student = Student::find($id);
        return view('student.show', compact('student'));
    }

    public function edit($id)
    {
        $student = Student::find($id);
        return view('student.edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $student->save();
        return redirect()->route('student.index');
    }

    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();
        return redirect()->route('student.index');
    }
}
