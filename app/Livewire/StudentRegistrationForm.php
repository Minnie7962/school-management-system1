<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Student;

class StudentRegistrationForm extends Component
{
    public $name = '';
    public $email = '';
    public $class = '';

    protected $rules = [
        'name' => 'required|min:2',
        'email' => 'required|email|unique:students,email',
        'class' => 'required|exists:classes,name'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $validatedData = $this->validate();
        
        Student::create($validatedData);
        
        $this->reset();
        session()->flash('success', 'Student registered successfully');
    }

    public function render()
    {
        return cache()->remember('student_dashboard_view', 3600, function() {
            return view('dashboard.student');
        });
    }
}
