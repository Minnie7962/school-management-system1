<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Attendance;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Subject;
use App\Models\Syllabus;
use App\Models\Notice;
use App\Models\Exam;
use App\Models\Mark;
use App\Models\FeeRecord;
use App\Models\Payroll;
use App\Models\Leave;
use App\Models\Feedback;
use App\Models\Notification;
use App\Models\TimeTable;
use Illuminate\Support\Facades\Auth;

class AdminController extends BaseController
{
    public function __construct()
    {
        $this->middleware(['auth', 'check.role:admin']);
    }

    public function index()
    {
        $admins = Admin::all();
        return view('admin.index', compact('admins'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $admin = new Admin();
        $admin->name = $request->input('name');
        $admin->email = $request->input('email');
        $admin->save();
        return redirect()->route('admin.index');
    }

    public function show($id)
    {
        $admin = Admin::find($id);
        return view('admin.show', compact('admin'));
    }

    public function edit($id)
    {
        $admin = Admin::find($id);
        return view('admin.edit', compact('admin'));
    }

    public function update(Request $request, $id)
    {
        $admin = Admin::find($id);
        $admin->name = $request->input('name');
        $admin->email = $request->input('email');
        $admin->save();
        return redirect()->route('admin.index');
    }

    public function destroy($id)
    {
        $admin = Admin::find($id);
        $admin->delete();
        return redirect()->route('admin.index');
    }
     
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function students()
    {
        $students = Student::all();
        return view('admin.students', compact('students'));
    }
    
    public function searchFunction()
    {
        // Implement search functionality
        return view('admin.search-function');
    }

    public function verifyRoleRedirect(Request $request)
    {
        // Verify role and redirect accordingly
        // Example:
        if ($request->user()->hasRole('admin')) {
            return redirect()->route('admin.dashboard');
        } elseif ($request->user()->hasRole('owner')) {
            return redirect()->route('owner.dashboard');
        } else {
            return redirect()->route('student.dashboard');
        }
    }

    public function attendance()
    {
        // Implement attendance management
    }

    public function teachers()
    {
        // Implement teacher management
    }

    public function subjects()
    {
        // Implement subject management
    }

    public function syllabuses()
    {
        // Implement syllabus management
    }

    public function notices()
    {
        // Implement notice management
    }

    public function exams()
    {
        // Implement exam management
    }

    public function marks()
    {
        // Implement mark management
    }

    public function feeRecords()
    {
        // Implement fee record management
    }

    public function payrolls()
    {
        // Implement payroll management
    }

    public function leaves()
    {
        // Implement leave management
    }

    public function feedbacks()
    {
        // Implement feedback management
    }

    public function notifications()
    {
        // Implement notification management
    }

    public function timeTables()
    {
        // Implement time table management
    }
}
