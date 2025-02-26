<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Student;
use App\Exports\StudentsExport;
use Maatwebsite\Excel\Facades\Excel;

class StudentList extends Component
{
    public $title = 'Student List';
    use WithPagination;

    public function mount()
    {
        // Removed the assignment of all students
    }

    public function export()
    {
        return Excel::download(new StudentsExport, 'students.xlsx');
    }

    public function render()
    {
        $students = Student::paginate(10);
        return view('livewire.student-list', ['students' => $students])
        ->layout('components.layouts.app', ['title' => $this->title, 'isPortal' => true]);
    }
}
