<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Student;
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
}
