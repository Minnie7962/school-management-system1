<?php

namespace App\Livewire;

use Livewire\Component;

class StudentPerformanceDashboard extends Component
{
    public $studentId;
    public $performanceMetrics = [];

    public function mount($studentId)
    {
        $this->studentId = $studentId;
        $this->loadPerformanceMetrics();
    }

    public function loadPerformanceMetrics()
    {
        $this->performanceMetrics = [
            'attendance' => $this->calculateAttendance(),
            'grades' => $this->calculateGrades(),
            // Additional metrics
        ];
    }

    public function render()
    {
        return view('livewire.student-performance-dashboard', [
            'metrics' => $this->performanceMetrics
        ]);
    }
}
